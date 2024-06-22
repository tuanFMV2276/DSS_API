<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    //thêm dòng timestamp disable
    public $timestamps = false;
    protected $table        = 'Product';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_code', 'product_name', 'image', 'main_diamond_id',
     'extra_diamond_id', 'number_ex_diamond', 'quantity','number','diamond_shell_id','size', 
     'price_rate', 'status'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function Ex_Diamond()
    {
        return $this->belongsTo(Ex_Diamond::class, 'extra_diamond_id');
    }

    public function Diamond_Shell()
    {
        return $this->belongsTo(Diamond_Shell::class, 'diamond_shell_id');
    }

    public function Main_Diamond()
    {
        return $this->belongsTo(Main_Diamond::class, 'main_diamond_id');
    }

    public function Warranty_Certificate()
    {
        $this->hasOne(Warranty_Certificate::class, "product_id");
    }

    public function Order_Detail()
    {
        $this->hasOne(Order_Detail::class, "product_id");
    }


    

}
