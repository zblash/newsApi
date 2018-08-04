<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title','description','status'];

     public function articles(){
    	return $this->hasMany('App\Article');
    }
}
