<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['title','price','describtion','status','image' ,'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
