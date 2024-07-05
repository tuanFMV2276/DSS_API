<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Detail extends Model
{
    use HasFactory;

    protected $table        = 'Order_Detail';
    protected $primaryKey   = 'id';
    public $timestamps = false;
    protected $fillable = ['order_id', 'product_id', 'unit_price'];
    
    public function Order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
    public function Product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}