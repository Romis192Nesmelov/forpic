@php ob_start(); @endphp
<input class="form-control input-{{ $name }}" {{ isset($min) && $min ? 'min='.$min : '' }} {{ isset($max) && $max ? 'max='.$max : '' }} name="{{ $name }}" type="{{ $type }}" placeholder="{{ isset($placeholder) && $placeholder ? $placeholder : '' }}" value="{{ isset($value) && !count($errors) ? $value : old($name) }}">
@include('_inputs_cover_block',['content' => ob_get_clean()])