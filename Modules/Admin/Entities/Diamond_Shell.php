<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Shell extends Model
{
    use HasFactory;

    protected $fillable = ['weight', 'price', 'status'];
    
    public function Product()
    {
        return $this->hasMany(Product::class, "diamond_shell_id");
    }

}
