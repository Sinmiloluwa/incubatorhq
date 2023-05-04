<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const EDITOR = 3;

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');      
     }
     
     public function users() {
        return $this->belongsToMany(User::class,'users_roles');    
     }
}
