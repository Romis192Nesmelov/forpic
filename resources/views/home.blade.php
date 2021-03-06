@extends('layouts.main')

@section('content')
    <div id="video-container" class="section half-height">
        <video autoplay="autoplay" preload="auto" muted="muted" loop="loop" poster="{{ asset('images/poster.jpg') }}">
            <source src="{{ asset('video/intro1.mp4') }}" type="video/mp4">
            <source src="{{ asset('video/intro1.mov') }}" type="video/quicktime">
            <source src="{{ asset('video/intro1.wmv') }}" type="video/wmv">
            <source src="{{ asset('video/intro1.m4v') }}" type="video/m4v">
            <source src="{{ asset('video/intro1.mpeg') }}" type="video/mpeg">
        </video>
    </div>

    {{--<a name="calculator"></a>--}}
    {{--<div class="section" data-scroll-destination="calculator">--}}
        {{--<div class="container calculator">--}}
            {{--<h1>{{ trans('menu.calculator') }}</h1>--}}
            {{--<h2>{{ trans('content.calculate_the_preliminary_cost') }}<sup class="star">*</sup></h2>--}}

            {{--@include('_calculator_block',['items' => $data['calculator'], 'start' => 0])--}}
            {{--@include('_calculator_block',['items' => $data['calculator'], 'start' => 6])--}}
            {{--@include('_calculator_block',['items' => $data['calculator'], 'start' => 12])--}}

            {{--<h1 id="calculator-value" class="text-center text-blue">{{ Helper::moneyFormat(0) }}</h1>--}}
            {{--<div class="col-md-12 col-sm-12 col-xs-12 text-center">--}}
                {{--@include('_button_block', [--}}
                    {{--'type' => 'button',--}}
                    {{--'text' => trans('content.reset'),--}}
                    {{--'icon' => 'icon-reset'--}}
                {{--])--}}
                {{--<p class="text-center text-gray"><sup class="star">*</sup> {{ trans('content.exact_cost') }}</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <a name="about_us"></a>
    <div class="section about" data-scroll-destination="about_us">
        <div class="container">
            <h1>{{ $data['content']->head }}</h1>
            <div class="col-md-6 col-sm-10 col-xs-12">{!! $data['content']->text !!}</div>
        </div>
    </div>

    <div class="section gray">
        <div class="container">
            <h1>{{ trans('content.six_reasons') }}</h1>
            @foreach($data['reasons'] as $reason)
                <div class="reason col-md-2 col-sm-4 col-xs-12">
                    <i class="{{ $reason->icon }}"></i>
                    <div class="description">{{ $reason->description }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h1>{{ trans('content.callback_me') }}</h1>
            <form class="form-horizontal text-center" action="{{ url('/callback2') }}" method="post">
                {{ csrf_field() }}
                @include('_input_block', [
                    'name' => 'phone',
                    'type' => 'text',
                    'placeholder' => '+7(___)___-__-__',
                    'value' => '',
                    'usingAjax' => true
                ])

                @include('_re_captcha_block', [
                    'id' => 'captcha1',
                    'usingAjax' => true
                ])

                {{--<div id="captcha1" class="g-recaptcha"></div>--}}

                @include('_checkbox_block',[
                    'addClass' => 'i_agree',
                    'name' => 'i_agree',
                    'label' => trans('content.i_agree')
                ])

                @include('_button_block', [
                    'type' => 'submit',
                    'text' => trans('content.callback_me'),
                    'icon' => 'icon-phone-wave',
                    'addAttr' => ['id' => 'call_me'],
                    'disabled' => true
                ])
            </form>
        </div>
    </div>

    {{--<a name="gallery"></a>--}}
    {{--<div class="section gray" data-scroll-destination="gallery">--}}
        {{--<div class="container">--}}
            {{--<h1>{{ trans('menu.gallery') }}</h1>--}}
            {{--<div class="owl-carousel galleries">--}}
                {{--@foreach($data['images'] as $document)--}}
                    {{--<div class="gallery">--}}
                        {{--<div class="image">--}}
                            {{--<a class="img-preview" href="{{ asset($document->path) }}"><img src="{{ asset($document->path) }}" /></a>--}}
                        {{--</div>--}}
                        {{--{{ $document->name }}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<a name="prices"></a>--}}
    {{--<a name="works"></a>--}}
    {{--<a name="spares"></a>--}}

    {{--<div class="section" data-scroll-destination="prices">--}}
        {{--<div data-scroll-destination="works"></div>--}}
        {{--<div data-scroll-destination="spares"></div>--}}

        {{--<div class="container">--}}
            {{--<h1>{{ trans('content.base_prices') }}</h1>--}}

            {{--<ul class="nav nav-tabs nav-tabs-highlight nav-justified">--}}
                {{--<li class="active"><a href="#works-price" data-toggle="tab">{{ trans('menu.works_price') }}</a></li>--}}
                {{--<li><a href="#spares-price" data-toggle="tab">{{ trans('menu.spares_price') }}</a></li>--}}
            {{--</ul>--}}

            {{--<div class="tab-content">--}}
                {{--<div class="tab-pane active" id="works-price">--}}
                    {{--@foreach($data['brands'] as $brand)--}}
                        {{--<h2>{{ $brand->name }}</h2>--}}
                        {{--<table class="table datatable-basic table-items price">--}}
                            {{--<tr>--}}
                                {{--<th class="text-center">{{ trans('content.item_name') }}</th>--}}
                                {{--<th class="text-center price">{{ trans('content.price') }}</th>--}}
                                {{--<th></th>--}}
                                {{--<th class="text-center">{{ trans('content.updated_at') }}</th>--}}
                            {{--</tr>--}}
                            {{--@foreach($brand->prices as $price)--}}
                                {{--<tr>--}}
                                    {{--<td class="text-left">{{ $price->name }}</td>--}}
                                    {{--<td class="text-center price">{{ Helper::moneyFormat($price->value) }}</td>--}}
                                    {{--<td></td>--}}
                                    {{--<td class="text-center">{{ $price->updated_at->format('d.m.Y') }}</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="spares-price">--}}
                    {{--@foreach($data['brands'] as $brand)--}}
                        {{--<h2>{{ $brand->name }}</h2>--}}
                        {{--<table class="table datatable-basic table-items price">--}}
                            {{--<tr>--}}
                                {{--<th class="text-center">{{ trans('content.item_name') }}</th>--}}
                                {{--<th class="text-center price">{{ trans('content.price') }}</th>--}}
                                {{--<th class="text-center">{{ trans('content.vendor_code') }}</th>--}}
                                {{--<th class="text-center">{{ trans('content.updated_at') }}</th>--}}
                            {{--</tr>--}}
                            {{--@foreach($brand->spares as $spare)--}}
                                {{--<tr>--}}
                                    {{--<td class="text-left">{{ $spare->name }}</td>--}}
                                    {{--<td class="text-center price">{{ Helper::moneyFormat($spare->value) }}</td>--}}
                                    {{--<td class="text-center">{{ $spare->code }}</td>--}}
                                    {{--<td class="text-center">{{ $spare->updated_at->format('d.m.Y') }}</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-sm-12 col-xs-12 text-center">--}}
                {{--<a data-toggle="modal" data-target="#callback-modal">--}}
                    {{--@include('_button_block', [--}}
                        {{--'addClass' => 'long-button',--}}
                        {{--'type' => 'button',--}}
                        {{--'text' => trans('content.i_want_to_order'),--}}
                        {{--'icon' => 'icon-phone-wave',--}}
                        {{--'addAttr' => ['id' => 'call_me'],--}}
                        {{--'disabled' => false--}}
                    {{--])--}}
                {{--</a>--}}
                {{--<p class="text-center text-gray">{!! trans('content.to_clarify_the_price').view('layouts._phone_block')->render() !!}</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <a name="actions"></a>
    <div class="section gray" data-scroll-destination="actions">
        <div class="container">
            <h1>{{ trans('menu.actions') }}</h1>
            <div class="owl-carousel actions">
                @foreach($data['actions'] as $action)
                    <div class="action" id="action_{{ $action->id }}">
                        <img src="{{ asset($action->image) }}" />
                        <div class="title">{{ $action->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--<a name="faq"></a>--}}
    {{--<div class="section" data-scroll-destination="faq">--}}
        {{--<div class="container">--}}
            {{--<h1>{{ trans('menu.questions') }}</h1>--}}
            {{--<div class="panel-group content-group-lg" id="faq">--}}
                {{--@foreach($data['questions'] as $item)--}}
                    {{--<div class="panel panel-white">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title text-left">--}}
                                {{--<a data-toggle="collapse" href="#faq{{ $item->id }}">{{ $item->question }}</a>--}}
                                {{--<i class="icon-help pull-right text-slate"></i>--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                        {{--<div id="faq{{ $item->id }}" class="panel-collapse collapse">--}}
                            {{--<div class="panel-body">{{ $item->answer }}</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <a name="contacts"></a>
    <div class="section" data-scroll-destination="contacts">
        <div class="container">
            <h1>{{ trans('menu.contacts') }}</h1>
            <h3 class="text-center"><i class="icon-location4"></i> {{ Settings::getSettings()->address }}</h3>
            <h4 class="text-center"><i class="icon-phone-wave"></i> @include('layouts._phone_block')</h4>
            <h4 class="text-center"><i class=" icon-watch2"></i> {{ trans('content.time_work', ['time' => Settings::getSettings()->time_work]) }}</h4>
        </div>
    </div>
    <div class="half-height" id="map"></div>
    <script>
        window.address = "{{ Settings::getSettings()->address }}";
        window.captchaKey = "{{ env('RE_CAPTCHA_KEY') }}";
    </script>

    <a name="driving"></a>
    <div class="section" data-scroll-destination="driving">
        <div class="container">
            <h1>{{ trans('menu.driving_video') }}</h1>
            @foreach ($data['video'] as $video)
                <div class="col-md-{{ ceil(12/count($data['video'])) }} col-sm-12 col-xs-12 video">
                    <iframe src="https://www.youtube.com/embed/{{ $video->link }}?controls=0" title="{{ $video->description }}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="description text-center">{{ $video->description }}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection