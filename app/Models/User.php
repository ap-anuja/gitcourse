<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //functionality for 1-1 relationship
    public function post(){
        return $this->hasOne('App\Models\Post');
    }
    //functionality for 1-many relationship
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    //functionality for many-many relationship
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
    }    
    //functionality for 1-1 polymorphic relationship
    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    //method for adding accessor
    public function getNameAttribute($value)
    {
        echo ucfirst($value);
        echo strtoupper($value);
    }

    //adding mutators
    public function setNameAttribute($value)
    {
       $this->attributes['name'] = strtoupper($value);
    }
}

//to customize the names and columns follow the format if you're not following the conventions
// return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');