<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public function products(){
        return $this->hasMany(ShopProduct::class, 'category_id');
    }
}
