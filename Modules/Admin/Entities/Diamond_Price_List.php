<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Price_List extends Model
{
    use HasFactory;

    protected $table        = 'DiamondPriceList';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['price', 'clarity', 'color','origin', 'cut', 'cara_weight'];
    

}
