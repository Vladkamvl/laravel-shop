<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    public function category(){
        return $this->belongsTo(ShopCategory::class);
    }
}
