<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = ['image','name','description','note','active'];
    
    public function options()
    {
        return $this->hasMany('App\Models\ActionOption');
    }
}