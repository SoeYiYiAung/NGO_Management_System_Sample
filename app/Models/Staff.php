<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'mobile', 'joinedDate', 'depId', 'position', 'age', 'gender', 'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    //Get the departments associated with the staff member.

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_staff', 'staff_id', 'department_id');
    }

    //Get the roles assigned to the staff member.
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'staff_id', 'role_id');
    }
}
