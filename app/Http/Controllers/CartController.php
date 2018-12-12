<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\Request;
use App\Models\CartItem;
use App\Models\ProductSku;

class CartController extends Controller
{
    //
    public function add(AddCartRequest $request)
    {
        $user = $request->user();
        $skuId = $request->input('sku_id');
        $amount = $request->input('amount');

        // 从数据库中查询该商品是否已经在购物车中
        if ($cart = $user->cartItem()->where('product_sku_id', $skuId)->first()) {
            // 如果存在则直接叠加商品数量
            $cart->update([
                              'amount' => $cart->amount + $amount,
                          ]);
        } else {
            // 否则创建一个新的购物车记录
            $cart = new CartItem(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];
    }

    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItem()->with(['productSku.product'])->get();

        return view('cart.index',compact('cartItems'));
    }

    public function remove(ProductSku $sku,Request $request)
    {
        $request->user()->cartItem()->where('product_sku_id',$sku->id)->delete();

        return [];
    }

}
