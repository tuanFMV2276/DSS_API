<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward_Point extends Model
{
    use HasFactory;

    protected $table        = 'Reward_Point';
    protected $primaryKey   = 'id';

    protected $fillable = ['customer_id', 'point'];
    
    public function Customer()
    {
        $this->belongsTo(Customer::class, "customer_id");
    }
}
