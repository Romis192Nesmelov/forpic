<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $fillable = ['name','code','value','brand_id'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}