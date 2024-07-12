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
    
    // protected $appends = ['price'];

    // public function getPriceAttribute()
    // {

    //     $diamonds = $this::join('DiamondPriceList', function ($join) {
    //         $join->on('Main_Diamond.origin', '=', 'DiamondPriceList.origin') 
    //               ->on('Main_Diamond.clarity', '=', 'DiamondPriceList.clarity')
    //               ->on('Main_Diamond.cut', '=', 'DiamondPriceList.cut')
    //               ->on('Main_Diamond.cara_weight', '=', 'DiamondPriceList.cara_weight')
    //               ->on('Main_Diamond.color', '=', 'DiamondPriceList.color');
    //     })->select('Main_Diamond.*', 'DiamondPriceList.price');

    //     dd($diamonds);
    //     $main_diamond = $diamonds::find($this->price);

    //     $main_diamond_Price = $main_diamond ? $main_diamond->price : 0;


    //     return $main_diamond_Price;
    // }

    public function Product()
    {
        return $this->hasMany(Product::class,"main_diamond_id");
    }

}