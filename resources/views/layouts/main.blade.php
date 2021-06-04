<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Mar 21 2018 11:43:04 GMT+0000 (UTC)  -->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seo['title'] }}</title>
    @foreach($metas as $meta => $params)
        @if ($seo[$meta])
            <meta {{ $params['name'] ? 'name='.$params['name'] : 'property='.$params['property'] }} content="{{ $seo[$meta] }}">
        @endif
    @endforeach

    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">--}}
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">

    <!-- Lang vars -->
    @include('layouts._lang_vars_block')
    <!-- /Lang vars -->

    <script type="text/javascript" src="https://api-maps.yandex.ru/2.1?apikey=fa455148-7970-4574-b087-4f913652328d&lang={{ App::getLocale().'_'.strtoupper(App::getLocale()) }}"></script>
    {{--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&hl={{ App::getLocale() }}"></script>--}}
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/libraries/bootstrap.min.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('js/plugins/loaders/blockui.min.js') }}"></script>--}}
    <!-- /core JS files -->

    <script type="text/javascript" src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/styling/bootstrap-switch.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}

    {{--<script type="text/javascript" src="{{ asset('js/plugins/ui/moment/moment.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/daterangepicker.js') }}"></script>--}}

    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/anytime.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/pickadate/picker.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/pickadate/picker.date.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/pickadate/picker.time.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/pickers/pickadate/legacy.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/pages/picker_date.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/datatables_basic.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('js/pages/components_thumbnails.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('js/core/libraries/jquery_ui/widgets.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/core/libraries/jquery_ui/touch.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/sliders/slider_pips.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/plugins/forms/styling/switchery.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/core/app.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/core/main.controls.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/preview_image.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/max_height.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/yamap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/masks.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/callback.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>

@include('layouts._message_modal_block')
@include('layouts._callback_modal_block')
@include('layouts._action_modal_block')

<div data-scroll-destination="home"></div>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        @include('layouts._nav_logo_block',['addClass' => 'visible-xs'])
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <i class="icon-arrow-down12"></i>
        </button>
    </div>
    <div class="container">
        @include('layouts._nav_logo_block',['addClass' => 'hidden-xs'])
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @include('layouts._menu_items_block',['menu' => $mainMenu, 'useHome' => false])
                <li class="phone hidden-sm">@include('layouts._phone_block')</li>
            </ul>
        </div>
    </div>
    <div class="beard"></div>
</nav>

<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

<!-- Footer -->
<div class="footer">
    <div class="container">
        <ul class="nav col-md-2 col-sm-3 col-xs-12">
            @include('layouts._menu_items_block',['menu' => array_slice($mainMenu,0,3), 'useHome' => true])
        </ul>
        <ul class="nav col-md-2 col-sm-3 col-xs-12">
            @include('layouts._menu_items_block',['menu' => array_slice($mainMenu,-4), 'useHome' => false])
        </ul>
        <div class="logos col-md-3 col-sm-3 col-xs-12">
            <div>{!! trans('content.certificated_service') !!}</div>
            <h4>Landrover&<br>Ford</h4>
            <div>@include('layouts._phone_block')</div>
        </div>
    </div>
</div>
<div class="sub-footer">
    <div class="container">
        @include('layouts._soc_icon_block',['href' => 'https://www.facebook.com/forpicserv', 'icon' => 'fa fa-facebook'])
        @include('layouts._soc_icon_block',['href' => 'https://vk.com/forpic2005', 'icon' => 'fa fa-vk'])
        <div class="copyright">©Forpic {{ date('Y') }}</div>
    </div>
</div>
<!-- /footer -->

<div id="on-top-button" data-scroll="home"><i class="icon-arrow-up12"></i></div>
<a href="https://wa.me/{{ Helper::hrefTel() }}" target="_blank"><img id="whatsapp-icon" src="{{ asset('images/whatsapp-messenger.png') }}"></a>
<a id="callback-button" data-toggle="modal" data-target="#callback-modal"><i class="icon-phone-wave"></i></a>

</body>
</html>
