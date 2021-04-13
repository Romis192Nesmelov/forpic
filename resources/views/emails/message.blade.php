@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 1, 'head' => $head])
    @include('emails._p_block',['content' => $content])

    @if (isset($buttonText) && isset($url))
        <?php ob_start(); ?>
        @include('emails._button_block',['href' => url($url), 'buttonText' => $buttonText])
        @include('emails._content_block', ['content' => ob_get_clean()])
    @endif

    @if (isset($url))
        @include('emails._footer_message_block',[
            'footerContent' => trans('auth.trouble_with_url_button', [
                'actionText' => $head,
                'actionURL' => url($url)
            ])
        ])
    @endif
@endsection