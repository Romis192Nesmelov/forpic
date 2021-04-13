@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.callback_request',['user_name' => $user_name ? $user_name : trans('content.unknown_name')])])
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.phone',['phone' => $phone])])
    @if ($question)
        @include('emails._p_block',['content' => $question])
    @endif
@endsection