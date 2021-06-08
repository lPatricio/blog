<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function posts(){

        return $this->belongsToMany(Post::class) ;
    }

    public function setNameAttribute($name){
        $this->attributes['name']= $name;
        $this->attributes['url']=str_slug($name);
    }

}
