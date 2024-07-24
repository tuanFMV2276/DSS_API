<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Shell extends Model
{
    use HasFactory;

    protected $table        = 'Diamond_Shell';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['name','image', 'price', 'status','weight','material_id'];
    
    public function Product()
    {
        return $this->hasMany(Product::class, "diamond_shell_id");
    }

    public function Material()
    {
        return $this->belongsTo(Material::class, "material_id");
    }

}
