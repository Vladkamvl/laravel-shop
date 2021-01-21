<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopOrderRequest;
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
     * Add ShopOrder to basket
     *
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

        if($order->products->contains($id)){
            $orderPivot = $order->products()->where('shop_product_id', $id)->first()->pivot;
            $orderPivot->count++;
            $orderPivot->update();
        }else{
            $order->products()->attach($id);
        }
        return redirect()->back();
    }

    /**
     * Remove ShopOrder from basket
     *
     * @param $id
     *
     * @return Response
     */
    public function remove($id){
        $orderId = session('orderId');
        if(is_null($orderId)){
            abort(404);
        }else{
            $order = ShopOrder::find($orderId);
            $orderPivot = $order->products()->where('shop_product_id', $id)->first()->pivot;
            if($orderPivot->count < 2){
                $order->products()->detach($id);
            }else{
                $orderPivot->count--;
                $orderPivot->update();
            }

        }
        return redirect()->route('basket.index');
    }

    /**
     * Checkout order
     *
     * @return Response
     */
    public function checkout(){
        $orderId = session('orderId');

        if(is_null($orderId)){
            return redirect()->route('basket.index')->with('checkoutError', 'You basket is null');
        }

        $order = ShopOrder::find($orderId);

        return view('shop.basket.checkout', compact('order'));
    }

    /**
     * Confirm order
     */
    public function confirm(ShopOrderRequest $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            abort(404);
        }
        $order = ShopOrder::find($orderId);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $success = $order->save();

        if($success){
            session()->flash('confirmOrder', 'You order success!');
        }
        return redirect()->route('shop.products.index');
    }
}
