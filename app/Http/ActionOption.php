<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ActionOption extends Model
{
    protected $fillable = ['description','action_id'];

    public function action()
    {
        return $this->belongsTo('App\Action');
    }
}