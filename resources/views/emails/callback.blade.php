@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.callback_request')])
    @include('emails._head_block',['hLevel' => 2, 'head' => trans('content.phone',['phone' => $phone])])
@endsection