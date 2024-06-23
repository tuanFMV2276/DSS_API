<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount_sale extends Model
{
    use HasFactory;

    protected $table        = 'Discount_sale';
    protected $primaryKey   = 'id';

    protected $fillable = ['customer_id', 'code_name', 'isse_date', 'expiry_date', 'discount_rate', 'status' ];
    
    public function Customer()
    {
        $this->belongsTo(Customer::class, "customer_id");
    }
}
