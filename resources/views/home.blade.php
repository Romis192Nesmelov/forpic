@extends('layouts.main')

@section('content')
    <div id="video-container" class="section half-height" data-scroll-destination="home">
        <video autoplay="autoplay" preload="auto" muted="muted" loop="loop" poster="{{ asset('images/poster.jpg') }}">
            <source src="{{ asset('video/intro1.mp4') }}">
            <source src="{{ asset('video/intro1.mov') }}">
            <source src="{{ asset('video/intro1.wmv') }}">
            <source src="{{ asset('video/intro1.m4v') }}">
            <source src="{{ asset('video/intro1.mkv') }}">
            <source src="{{ asset('video/intro1.mpeg') }}">
        </video>
    </div>

    <a name="calculator"></a>
    <div class="section" data-scroll-destination="calculator">
        <div class="container calculator">
            <h1>{{ trans('menu.calculator') }}</h1>
            <h2>{{ trans('content.calculate_the_preliminary_cost') }}<sup class="star">*</sup></h2>

            @include('_calculator_block',['items' => array_slice($data['calculator'], 0, 6)])
            @include('_calculator_block',['items' => array_slice($data['calculator'], 6, 6)])
            @include('_calculator_block',['items' => array_slice($data['calculator'], 12, 6)])

            <h1 id="calculator-value" class="text-center text-blue">{{ Helper::moneyFormat(0) }}</h1>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                @include('_button_block', [
                    'type' => 'button',
                    'text' => trans('content.reset'),
                    'icon' => 'icon-reset'
                ])
                <p class="text-center text-gray"><sup class="star">*</sup> {{ trans('content.exact_cost') }}</p>
            </div>
        </div>
    </div>

    <div class="section gray">
        <div class="container">
            <h1>{{ trans('content.callback_me') }}</h1>
            <form class="form-horizontal text-center" action="{{ url('/callback') }}" method="post">
                {{ csrf_field() }}
                @include('_input_block', [
                    'name' => 'phone',
                    'type' => 'text',
                    'placeholder' => '+7(___)___-__-__',
                    'value' => '',
                    'usingAjax' => true
                ])

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

    <a name="about_us"></a>
    <div class="section about" data-scroll-destination="about_us">
        <div class="container">
            <h1>{{ trans('menu.about_us') }}</h1>
            <div class="col-md-6 col-sm-10 col-xs-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus rhoncus egestas. In elementum arcu at dui imperdiet fermentum. Aenean non elementum ipsum. Curabitur sit amet pretium arcu, eget viverra nulla. Phasellus facilisis condimentum blandit. Proin in interdum velit. Mauris vitae blandit urna, eget varius quam. In efficitur laoreet augue, vel tincidunt felis aliquet vitae. Vestibulum vitae mauris bibendum, congue neque ut, egestas libero. Donec venenatis egestas mauris. Etiam placerat purus dui, vel feugiat dui congue vel. Sed a diam ac tellus tristique tempor. In placerat imperdiet eros.</p>
                <p>Cras eget ipsum a ipsum viverra sodales tincidunt at elit. Aenean dignissim consectetur arcu. Donec vestibulum luctus tortor, ut molestie enim molestie at. Maecenas eu eleifend ligula. Nulla purus lorem, commodo at tincidunt in, tincidunt id massa. Donec a lectus a erat porta porttitor. Mauris tristique dolor sit amet tincidunt semper. Praesent aliquam non nunc eu elementum. Nulla facilisi. Proin in aliquam metus, id congue nisi. Duis auctor neque sed lectus aliquam blandit. Aenean a augue ornare, volutpat risus id, elementum nulla. Nulla aliquam sem non erat eleifend, quis rhoncus nulla ornare. Aenean molestie ornare urna et finibus. Nunc eu felis erat.</p>
            </div>
        </div>
    </div>

    <a name="documents"></a>
    <div class="section gray" data-scroll-destination="documents">
        <div class="container">
            <h1>{{ trans('menu.documents') }}</h1>
            <div class="owl-carousel documents">
                @foreach($data['documents'] as $document)
                    <div class="document">
                        <div class="image">
                            <a class="img-preview" href="{{ asset($document->path) }}"><img src="{{ asset($document->path) }}" /></a>
                        </div>
                        {{ $document->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <a name="documents"></a>
    <div class="section" data-scroll-destination="documents">
        <div class="container">
            <h1>{{ trans('content.base_prices') }}</h1>
            @php
                $pricePart = round(count($data['price'])/3);
                $priceParts = round(count($data['price'])/$pricePart);
            @endphp
            @for($p=0;$p<$priceParts;$p++)
                @include('_price_block',[
                    'items' => $data['price'],
                    'start' => $p*$pricePart,
                    'end' => ($p+1)*$pricePart
                ])
            @endfor
            <p class="text-center text-gray">{!! trans('content.to_clarify_the_price').view('layouts._phone_block')->render() !!}</p>
        </div>
    </div>

    <a name="actions"></a>
    <div class="section gray" data-scroll-destination="actions">
        <div class="container">
            <h1>{{ trans('menu.actions') }}</h1>
            <div class="owl-carousel actions">

            </div>
        </div>
    </div>

    <a name="contacts"></a>
    <div class="section" data-scroll-destination="contacts">
        <div class="container">
            <h3 class="text-center"><i class="icon-location4"></i> {{ Settings::getSettings()->address }}</h3>
            <h4 class="text-center"><i class="icon-phone-wave"></i> @include('layouts._phone_block')</h4>
            <h4 class="text-center"><i class=" icon-watch2"></i> {{ trans('content.time_work', ['time' => Settings::getSettings()->time_work]) }}</h4>
        </div>
    </div>
    <div class="half-height" id="map"></div>
    <script>window.address = "{{ Settings::getSettings()->address }}";</script>
@endsection