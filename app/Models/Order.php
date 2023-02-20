<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['products'];

    protected $fillable = [
        'date',
        'phone',
        'email',
        'coords',
        'sum',
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id')->withPivot(['count']);
    }

    public function products_count(){
        return $this->products->pluck('pivot')->sum('count');
    }

    public function getCoordsArray(){
        return explode(',',$this->coords);
    }
}
