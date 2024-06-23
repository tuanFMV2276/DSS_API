<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table        = 'Order';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['customer_id', 'order_date', 'total_price', 'name', 'email', 'address', 'phone', 'status'];
    
    public function Payment()
    {
        return $this->hasMany(Payment::class, "order_id");
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    
    public function Order_Detail()
    {
        return $this->hasMany(Order_Detail::class, 'order_id');
    }
}