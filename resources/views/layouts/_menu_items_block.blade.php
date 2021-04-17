@if ($useHome)
    <li><a {{ Request::path() == '/' ? 'data-scroll=home' : 'href='.url('/') }}>{{ trans('menu.home') }}</a></li>
@endif
@foreach($menu as $item)
    <li {{ isset($item['submenu']) ? 'class=dropdown' : '' }}>
        <a {{ isset($item['href']) ? 'href='.$item['href'] : (Request::path() == '/' ? 'data-scroll='.$item['data_scroll'] : 'href='.url('/#'.$item['data_scroll'])) }}>{!! $item['name'] !!}</a>
        @if (isset($item['submenu']) && is_array($item['submenu']))
            <ul class="dropdown-menu">
                @foreach($item['submenu'] as $name => $href)
                    <li><a data-scroll="{{ $href }}">{{ $name }}</a></li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach