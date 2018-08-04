<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['group_id','title','text','image_url','status','ff'];

    public function group(){
    	return $this->belongsTo('App\Group','group_id');
    }
}
