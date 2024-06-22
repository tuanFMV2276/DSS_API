<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ex_Diamond extends Model
{
    use HasFactory;

    //thêm dòng timestamp disable
    public $timestamps = false;
    protected $table        = 'Extra_Diamond';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'quantity', 'price', 'status'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function Product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
    

}
