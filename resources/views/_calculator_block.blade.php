<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-flat">
        <div class="panel-body">
            @foreach($items as $name => $value)
                @include('_checkbox_block',[
                    'name' => $value,
                    'label' => trans('content.'.$name)
                ])
            @endforeach
        </div>
    </div>
</div>