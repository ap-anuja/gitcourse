<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'post_image',
        'body',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function setPostImage($value)
    // {
    //     $this->attributes['post_image']=asset($value);
    // }

    public function getPostImageAttribute($value)
    {
        return asset($value);
    }
}
