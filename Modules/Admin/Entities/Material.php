<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond_Shell extends Model
{
    use HasFactory;

    protected $table        = 'Material';
    protected $primaryKey   = 'id';
    public $timestamps = false;

    protected $fillable = ['material_name','price','status'];
    
    public function Diamond_Shell()
    {
        return $this->hasMany(Diamond_Shell::class, "material_id");
    }

}
