<div class="{{ isset($addClass) ? $addClass : '' }} checkbox-container">
    <input type="checkbox" name="{{ $name }}" class="styled" {{ isset($checked) && $checked ? 'checked=checked' : '' }}>
    <label class="checkbox-inline">{{ $label }}</label>
</div>