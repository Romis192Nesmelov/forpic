@extends('layouts.main')

@section('content')
    <a name="contacts"></a>
    <div class="section" data-scroll-destination="contacts">
        <div class="container">
            <h3 class="text-center"><i class="icon-location4"></i> {{ Settings::getSettings()->address }}</h3>
            <h4 class="text-center"><i class="icon-phone-wave"></i> @include('layouts._phone_block')</h4>
            <h4 class="text-center"><i class=" icon-watch2"></i> {{ trans('content.time_work', ['time' => Settings::getSettings()->time_work]) }}</h4>
        </div>
    </div>
    <div id="map"></div>
    <script>window.address = "{{ Settings::getSettings()->address }}";</script>

@endsection