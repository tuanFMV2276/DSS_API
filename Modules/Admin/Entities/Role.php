<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table        = 'Role';
    protected $primaryKey   = 'id';

    protected $fillable = ['role_name', 'status'];
    
    public function Employee()
    {
        return $this->hasMany(Employee::class, "role_id");
    }
}
