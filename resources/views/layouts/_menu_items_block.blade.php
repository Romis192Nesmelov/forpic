@if ($useHome)
    <li><a {{ Request::path() == '/' ? 'data-scroll=home' : 'href='.url('/') }}>{{ trans('menu.home') }}</a></li>
@endif
@foreach($menu as $item)
    <li><a {{ isset($item['href']) ? 'href='.$item['href'] : (Request::path() == '/' ? 'data-scroll='.$item['data_scroll'] : 'href='.url('/#'.$item['data_scroll'])) }}>{!! $item['name'] !!}</a></li>
@endforeach