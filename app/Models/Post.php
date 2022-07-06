<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'content', 'path'];
    protected $guarded = [];
    //for retreiving the image path
    public $directory = "/images/";


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //for polymorphic relationship
    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    //for polymorphic relationship many to many
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    //adding query scope
    public static function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc')->get();
    }
    
    //adding accessor for the image path
    public function getImageAttribute($value)
    {
        return $this->directory.$value;
    }
}

