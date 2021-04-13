<div class="form-group has-feedback has-feedback-left {{ isset($icon) && $icon ? 'has-icon' : '' }} {{ isset($addClass) ? $addClass : '' }} {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    @include('_label_block')
    @include('_error_icon_block')
    {!! $content !!}
    @include('_error_help_block')
</div>