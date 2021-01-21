<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    public function category(){
        return $this->belongsTo(ShopCategory::class);
    }
    public function getTotalCost(){
        if(!is_null($this->pivot)){
            $count = $this->pivot->count;
            return $this->price * $count;
        }
        return $this->price;
    }
}
