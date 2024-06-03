<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Price_List extends Model
{
    use HasFactory;

    protected $table        = 'Diamond_Price_List';
    protected $primaryKey   = 'id';

    protected $fillable = ['price', 'clarity', 'origin', 'cut', 'cara_weight'];
    

}
