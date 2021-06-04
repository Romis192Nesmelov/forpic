@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.action_request',[
        'action_name' => $name,
        'user_name' => isset($user_name) && $user_name ? $user_name : trans('content.unknown_name')
    ])])
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.phone',['phone' => $phone])])
    @if (isset($options) && $options)
        @include('emails._head_block',['hLevel' => 3, 'head' => trans('content.selected_options')])
        <ul>
            @foreach($options as $option)
                <li>{{ $option }}</li>
            @endforeach
        </ul>
    @endif
@endsection