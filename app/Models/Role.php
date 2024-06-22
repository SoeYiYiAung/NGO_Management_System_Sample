<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Get the permissions associated with the role.

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles');
    }

    
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    //Get the staff members assigned to this role.
    
    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'role_users', 'role_id', 'staff_id');
    }
}
