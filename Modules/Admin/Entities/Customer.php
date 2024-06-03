<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table        = 'Customer';
    protected $primaryKey   = 'id';

    protected $fillable = ['name', 'email', 'password', 
     'phone', 'address', 'date_of_birth', 'gender', 'status'];
    
    public function Reward_Point()
    {
        return $this->hasOne(Reward_Point::class, 'customer_id');
    }

    public function Order()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
