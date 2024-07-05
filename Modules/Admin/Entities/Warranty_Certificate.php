<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warranty_Certificate extends Model
{
    use HasFactory;

    protected $table        = 'Warranty_Certificate';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['product_id', 'issue_date', 'expiry_date', 'status'] ;
    
    public function Product()
    {
        $this->belongsTo(Product::class, "product_id");
    }
}
