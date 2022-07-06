<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function posts(){
        //the 1st param is the Post Table and 2nd param is the User table where it has the country_id
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User');
    }
}
