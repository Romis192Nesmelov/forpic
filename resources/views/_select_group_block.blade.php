@php ob_start(); @endphp
<select name="{{ $name }}" class="form-control">
    @foreach ($groups as $group => $items)
        <optgroup label="{{ $group }}">
            @foreach ($items as $value => $options)
                <option value="{{ $value }}" {{ (!count($errors) ? $value == $selected : $value == old($name)) ? 'selected' : '' }}>{{ $options }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>
@include('_inputs_cover_block',['content' => ob_get_clean()])