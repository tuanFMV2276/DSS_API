<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table        = 'Employee';
    protected $primaryKey   = 'id';
    //thêm dòng timestamp disable
    public $timestamps = false;

    protected $fillable = ['user_name', 'email', 'password', 
    'role_id', 'phone', 'address', 
    'date_of_birth', 'gender', 'status'];
    
     public function Role()
     {
         return $this->belongsTo(Role::class, "role_id");
     }

}
