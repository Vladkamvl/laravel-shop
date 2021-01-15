<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    public function products(){
        return $this->belongsToMany(ShopProduct::class, 'order_product');
    }
}
