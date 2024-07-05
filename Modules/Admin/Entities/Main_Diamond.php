<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main_Diamond extends Model
{
    use HasFactory;
    //thêm dòng timestamp disable
    public $timestamps = false;
    protected $table        = 'Main_Diamond';
    protected $primaryKey   = 'id';

    protected $fillable = 
    ['shape', 'origin', 'cara_weight', 
    'clarity','color', 'describe', 
    'quantity', 'cut', 'polish', 
    'symmetry', 'measurements',
    'culet', 'fluorescence', 'status'
];
    public function Product()
    {
        return $this->hasMany(Product::class,"main_diamond_id");
    }

}