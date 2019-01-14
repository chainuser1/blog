<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
class Post extends Model
{
    //@optional
    protected $table="post";
    protected $fillable=['user_id','title', 'content'];
    public function user(){
       return $this->belongsTo(User::class);
    }
   
    function gestTitleAttribute($value){
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
