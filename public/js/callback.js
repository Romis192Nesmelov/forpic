$(document).ready(function ($) {
    window.phoneRegExp = /^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/gi;

    $('input[name=phone]').keyup(function () {
        unlockSendButton($(this));
    }).mask("+7(999)999-99-99",{completed:function(){
        unlockSendButton($(this));
    }});

    $('input[name=i_agree]').change(function () {
        unlockSendButton($(this));
    });

    $('form button[type=submit]').click(function(e) {
        e.preventDefault();

        var self = $(this),
            form = self.parents('form'),
            textarea = form.find('textarea'),
            select = form.find('select'),
            radio = form.find('input[type=radio]'),
            checkboxes = form.find('input[type=checkbox]'),
            agree = form.find('input[name=i_agree]').is(':checked'),
            fields = {},
            token = form.find('input[name=_token]').val();

        if (!agree) return false;

        fields = processingFields(fields,form.find('input'));
        fields = processingFields(fields,select);
        fields = processingFields(fields,textarea);
        fields = processingCheckFields(fields,radio);
        fields = processingCheckFields(fields,checkboxes);

        fields['_token'] = token;
        fields['i_agree'] = agree;

        $('.error').html('');
        var allErrors = $('.form-group.has-feedback.has-error');
        allErrors.removeClass('has-error');
        allErrors.find('.help-block').html('');

        addLoaderScreen();

        $.post(form.attr('action'), fields)
            .done(function(data) {
                self.parents('.modal').modal('hide');
                var messageModal = $('#message');
                messageModal.find('h3').html(data.message);
                messageModal.modal('show');
                form.trigger('reset');
                form.find('.btn-primary').attr('disabled','disabled');
                $('span.checked').removeClass('checked');

                var captchaCount = 0;
                $('.g-recaptcha').each(function () {
                    grecaptcha.reset(captchaCount);
                    captchaCount++;
                });
                
                removeLoaderScreen();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                var responseMsg = jQuery.parseJSON(jqXHR.responseText),
                    replaceErr = {
                        'phone':'«Телефон»',
                        'email':'«E-mail»',
                        'user_name':'«Имя»'
                    };
                $.each(responseMsg.errors, function (field, error) {
                    var errorMsg = error[0],
                        errorBlock = $('.input-'+field).parents('.form-group.has-feedback'),
                        errorMessage = errorBlock.find('.help-block');

                    $.each(replaceErr, function (src,replace) {
                        errorMsg = errorMsg.replace(src,replace);
                    });
                    errorBlock.addClass('has-error');
                    errorMessage.html(errorMsg);
                });
                removeLoaderScreen();
            });
    });
});

function processingFields(fields, inputObj) {
    if (inputObj.length) {
        $.each(inputObj, function (key, obj) {
            if (obj.type != 'checkbox' && obj.type != 'radio') fields[obj.name] = obj.value;
        });
    }
    return fields;
}

function processingCheckFields(fields, inputObj) {
    if (inputObj.length) {
        inputObj.each(function(){
            if($(this).is(':checked')) {
                fields[$(this).attr('name')] = $(this).val();
            }
        });
    }
    return fields;
}

function unlockSendButton(obj) {
    var form = obj.parents('form'),
        button = form.find('button[type=submit]'),
        checkBox = form.find('input[name=i_agree]'),
        phoneInput = form.find('input[name=phone]');

    if (checkBox.is(':checked') && phoneInput.val().match(window.phoneRegExp)) button.removeAttr('disabled');
    else button.attr('disabled','disabled');
}

function reCaptchaCallback() {
    $('.g-recaptcha').each(function () {
        var id = $(this).attr('id');
        grecaptcha.render(id, {
            'sitekey':window.captchaKey
        });
    });
};