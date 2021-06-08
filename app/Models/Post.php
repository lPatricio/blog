<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['published_at'];

    public function getRouteKeyName(){
        return 'url';
    }

    public function category(){
           return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query){
        $query->whereNotNull('published_at')
              ->where('published_at','<=',Carbon::now())
              -> latest('published_at')
        ;
    }

    public function setTitleAttribute($title){
        $this->attributes['title']=$title;
        $this->attributes['url']=str_slug($title);
    }
}
