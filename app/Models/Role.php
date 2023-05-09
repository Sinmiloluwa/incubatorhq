<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     public function getRoleUser($id)
     {
        $user = DB::table('users_roles')->where('role_id',1)->value('user_id');
        return $user;
     }
}
