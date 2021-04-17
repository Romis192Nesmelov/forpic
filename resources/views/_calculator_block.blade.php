<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-flat">
        <div class="panel-body">
            @for($i=$start;$i<$start+6;$i++)
                @include('_checkbox_block',[
                    'name' => $items[$i]->value,
                    'label' => trans('content.'.$items[$i]->name)
                ])
            @endfor
        </div>
    </div>
</div>