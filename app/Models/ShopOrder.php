<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    public function products(){
        return $this->belongsToMany(ShopProduct::class, 'order_product')
            ->withPivot('count')
            ->withTimestamps();
    }
    public function calculateTotalCost(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getTotalCost();
        }
        return $sum;
    }
}
