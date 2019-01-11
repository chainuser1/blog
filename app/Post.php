<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    //@optional
    protected $table="post";
    protected $fillable=['title','content'];

    function getTitleAttribute($value){
        //mutate our post title first letter
        return ucfirst($value);
    }

    function setTitleAttribute($value){
        //convert title to lowercase
        return $this->attributes['title']=strtolower($value);
    }

    function getCreatedAtAttribute($value){
        $date_now=Carbon::now();
        return $date_now->diffForHumans($value);
    }

    function getUpdatedAtAttribute($value){
        $date_now=Carbon::now();
        return $date_now->diffForHumans($value);
    }
}
