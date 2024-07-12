<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Shell extends Model
{
    use HasFactory;

    protected $table        = 'Diamond_Shell';
    protected $primaryKey   = 'id';

    protected $fillable = ['name','weight', 'material_id', 'status'];

    protected $appends = ['price'];

    public function getPriceAttribute()
    {
        $material = Material::find($this->material_id);

        $materialPrice = $material ? $material->price : 0;

        $totalPrice = $materialPrice * $this->weight;

        return $totalPrice;
    }
    
    public function Product()
    {
        return $this->hasMany(Product::class, "diamond_shell_id");
    }

}
