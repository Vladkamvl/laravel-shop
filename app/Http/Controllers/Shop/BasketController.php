<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BasketController extends BaseController
{
    public function index(){
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = ShopOrder::findOrFail($orderId);
            return view('shop.basket.index', compact('order'));
        }else{
            $order = new ShopOrder();
            $order->products = [];
        }
        return view('shop.basket.index', compact('order'));
    }
    /**
     * @param int $id
     */
    public function add($id){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = ShopOrder::create();
            session(['orderId' => $order->id]);
        }else{
            $order = ShopOrder::find($orderId);
        }
        $order->products()->attach($id);
        return Redirect::back();
    }
}
