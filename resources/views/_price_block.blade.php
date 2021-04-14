<div class="col-md-{{ 12/$priceParts > 4 ? 4 : round(12/$priceParts) }} col-sm-12 col-xs-12">
    <div class="panel panel-flat">
        <div class="panel-body">
            <table class="price">
                @for($i=$start;$i<(count($items) < $end ? count($items) : $end);$i++)
                    <tr>
                        <td class="name">{{ $items[$i]->name }}</td>
                        <td class="value">{{ Helper::moneyFormat($items[$i]->value) }}</td>
                    </tr>
                @endfor
            </table>
        </div>
    </div>
</div>