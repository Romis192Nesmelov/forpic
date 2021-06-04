<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ActionOption extends Model
{
    protected $fillable = ['description','action_id'];

    public function action()
    {
        return $this->belongsTo('App\Models\Action');
    }
}