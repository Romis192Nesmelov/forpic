@if ( (count($errors) && $errors->has($name)) || (isset($usingAjax) && $usingAjax) )
    <div class="help-block {{ isset($helpBlockAddClass) ? $helpBlockAddClass : '' }}">{{ $errors->first($name) }}</div>
@endif