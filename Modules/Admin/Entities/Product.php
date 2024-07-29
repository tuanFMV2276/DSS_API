<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    //thêm dòng timestamp disable
    public $timestamps = false;
    protected $table        = 'Product';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'product_code', 'product_name', 'image', 'main_diamond_id',
        'extra_diamond_id', 'number_ex_diamond', 'quantity', 'number', 'diamond_shell_id', 'size',
        'price_rate', 'status'
    ];

    protected $appends = ['total_price'];

    // public function getTotalPriceAttribute()
    // {
    //     $diamondShell = Diamond_Shell::find($this->diamond_shell_id);
    //     //$mainDiamond = Main_Diamond::find($this->main_diamond_id);
    //      $mainDiamond = Main_Diamond::find($this->main_diamond_id)::join('DiamondPriceList', function ($join) {
    //         $join->on('Main_Diamond.origin', '=', 'DiamondPriceList.origin') 
    //               ->on('Main_Diamond.clarity', '=', 'DiamondPriceList.clarity')
    //               ->on('Main_Diamond.cut', '=', 'DiamondPriceList.cut')
    //               ->on('Main_Diamond.cara_weight', '=', 'DiamondPriceList.cara_weight')
    //               ->on('Main_Diamond.color', '=', 'DiamondPriceList.color')->select('Main_Diamond.*', 'DiamondPriceList.price as price');;
    //     });
    //     $extraDiamond = Ex_Diamond::find($this->extra_diamond_id);

    //     $diamondShellPrice = $diamondShell ? $diamondShell->price : 0;
    //     $mainDiamondPrice = $mainDiamond ? $mainDiamond->price : 0;
    //     $extraDiamondPrice = $extraDiamond ? $extraDiamond->price * $this->number_ex_diamond : 0;

    //     $totalPrice = ($diamondShellPrice + $mainDiamondPrice + $extraDiamondPrice) * $this->price_rate;

    //     return $totalPrice;
    // }

    public function getTotalPriceAttribute()
{
    // Lấy giá trị của Diamond_Shell
    $diamondShell = Diamond_Shell::find($this->diamond_shell_id);

    // Thực hiện join giữa Main_Diamond và DiamondPriceList
    $mainDiamond = Main_Diamond::join('DiamondPriceList', function ($join) {
            $join->on('Main_Diamond.origin', '=', 'DiamondPriceList.origin')
                 ->on('Main_Diamond.clarity', '=', 'DiamondPriceList.clarity')
                 ->on('Main_Diamond.cut', '=', 'DiamondPriceList.cut')
                 ->on('Main_Diamond.cara_weight', '=', 'DiamondPriceList.cara_weight')
                 ->on('Main_Diamond.color', '=', 'DiamondPriceList.color');
        })
        ->where('Main_Diamond.id', $this->main_diamond_id)
        ->select('Main_Diamond.*', 'DiamondPriceList.price as price')
        ->first();

    // Lấy giá trị của Ex_Diamond
    $extraDiamond = Ex_Diamond::find($this->extra_diamond_id);

    // Tính giá trị của các thành phần
    $diamondShellPrice = $diamondShell ? $diamondShell->price : 0;
    $mainDiamondPrice = $mainDiamond ? $mainDiamond->price : 0;
    $extraDiamondPrice = $extraDiamond ? $extraDiamond->price * $this->number_ex_diamond : 0;

    // Tính tổng giá trị
    $totalPrice = ($diamondShellPrice + $mainDiamondPrice + $extraDiamondPrice) * $this->price_rate;

    return $totalPrice;
}


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function Ex_Diamond()
    {
        return $this->belongsTo(Ex_Diamond::class, 'extra_diamond_id');
    }

    public function Diamond_Shell()
    {
        return $this->belongsTo(Diamond_Shell::class, 'diamond_shell_id');
    }

    public function Main_Diamond()
    {
        return $this->belongsTo(Main_Diamond::class, 'main_diamond_id');
    }

    public function Warranty_Certificate()
    {
        $this->hasOne(Warranty_Certificate::class, "product_id");
    }

    public function Order_Detail()
    {
        $this->hasOne(Order_Detail::class, "product_id");
    }

}