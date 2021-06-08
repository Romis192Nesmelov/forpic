@php ob_start(); @endphp
<div id="{{ $id }}" class="g-recaptcha input-g-recaptcha-response"></div>
{{--<div class="g-recaptcha input-g-recaptcha-response" data-sitekey="{{ env('RE_CAPTCHA_KEY') }}"></div>--}}
@include('_inputs_cover_block',['content' => ob_get_clean(), 'name' => 'g-recaptcha-response', 'helpBlockAddClass' => 'text-center'])