<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','body','iframe','excerpt','published_at','category_id'
    ];

    protected $dates=['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        } );
    }

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

  /*  public function setTitleAttribute($title){
        $this->attributes['title']=$title;

        $url=str_slug($title);
        $duplicatedUrlCount=Post::where('url','LIKE',"{$url}%")->count();

        if ( $duplicatedUrlCount) {
            $url.="-".++$duplicatedUrlCount;
        }
        $this->attributes['url']=$url;
    }*/

    public static function create(array $attributes=[]){

        $post=static::query()->create($attributes);
        $post->generarUrl();
        return $post;
    }

    public function generarUrl(){
        $url=str_slug( $this->title);

        if ($this->whereUrl($url)->exists() ) {
            $url="{$url}-{$this->id}";

        }
        $this->url=$url;
        $this->save();

    }

    public function setPublishedAtAttribute($published_at){

        $this->attributes['published_at']=  $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category){

        $this->attributes['category_id']=Category::find( $category)
                                         ? $category
                                         : Category::create(['name' => $category ])->id  ;

    }

    public function syncTags($tags){

        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag :Tag::create(['name'=>$tag ])->id;
        });

       return $this->tags()->sync($tagIds);
    }
}
