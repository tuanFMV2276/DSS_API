<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;
    //thêm dòng timestamp disable
    public $timestamps = false;
    protected $table        = 'Material';
    protected $primaryKey   = 'id';

    protected $fillable = 
    [ 'material_name', 'price', 'status'];
}
