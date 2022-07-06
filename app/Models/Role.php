<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

   // functionality for many-many relationship
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }    
}
