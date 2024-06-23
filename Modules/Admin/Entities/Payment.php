<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table        = 'Payment';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['payment_method', 'order_id', 'date_time', 'status'];
    
    public function Order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
}