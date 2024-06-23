<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CetificateMainDiamond extends Model
{
    use HasFactory;

    protected $table        = 'Certificate-MainDiamond';
    protected $primaryKey   = 'id';

    protected $fillable = ['desribe', 'type'];
    
}
