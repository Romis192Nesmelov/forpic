@php ob_start(); @endphp
<input class="form-control file-styled input-{{ $name }}" type="file" name="{{ $name }}">
@include('_inputs_cover_block',['content' => ob_get_clean()])