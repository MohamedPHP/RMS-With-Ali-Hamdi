<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title','price','describtion','status','image' ,'user_id' ,'menu_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
