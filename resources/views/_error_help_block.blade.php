@if ( (count($errors) && $errors->has($name)) || (isset($usingAjax) && $usingAjax) )
    <div class="help-block">{{ $errors->first($name) }}</div>
@endif