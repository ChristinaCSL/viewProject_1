<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function roles(){
        return $this->hasMany(UserRole::class,'role_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_roles');
    }
}
