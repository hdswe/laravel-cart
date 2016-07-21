<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param $item_id
     * @param $quantity
     * @return array
     */
    public function addToCart($item_id, $quantity)
    {
        if ($this->exist($item_id)) {
            //instead of <code> $old_cart = Cart::where(); </code> , <code> $new_cart = $this->cart->where(); </code>
            $old_cart = $this->cart->where('item_id', $item_id)->where('user_id', Auth::id())->first();
            $old_cart_count = $old_cart->count;
            $new_cart_count = $old_cart_count + $quantity;
            $old_cart->count = $new_cart_count;
            $old_cart->save();
        } else {
            //instead of <code> $new_cart = new Cart(); </code> , <code> $new_cart = $this->cart->newInstance(); </code>
            $new_cart = $this->cart->newInstance();
            $new_cart->user_id = Auth::id();
            $new_cart->item_id = $item_id;
            $new_cart->count = $quantity;
            $new_cart->save();
        }
    }

    /**
     * this function delete item from cart
     * @param $item_id
     * @return bool
     */
    public function deleteItemFromCart($item_id)
    {
        //instead of <code> $my_cart = Cart::where(); </code> , <code> $my_cart = $this->cart->where(); </code>
        $my_cart = $this->cart->where('user_id', Auth::id())->where('item_id', $item_id)->first();
        //$my_cart = Cart::where('user_id',Auth::id())->where('item_id',$item_id)->get();
        //Cart::destroy($my_cart->id);
        $my_cart->delete();

        return true;

    }

    /**
     * this function check if item exist or not
     * @param $item_id
     * @return bool
     */
    public function exist($item_id)
    {
        //instead of <code> Cart::where(); </code> , <code> $this->cart->where(); </code>
        return $this->cart->where('user_id', Auth::id())->where('item_id', $item_id)->exists();
//        return Cart::where('user_id',Auth::id())->where('item_id',$item_id)->first();
    }

    /**
     * this function show my cart item and item for each other
     * @return mixed
     */
    public function show()
    {
        //instead of <code> Cart::where(); </code> , <code> $this->cart->where(); </code>
        $carts = $this->cart->where('user_id', Auth::id())->get();
//        foreach ($carts as $cart){
//            $cart_name = Item::find($cart->item_id)->name;
//            return $cart_name;
//            return $cart->item->name;
//        }
        return view('cart.index')->with('items', $carts)->with('total', $this->price());
    }

    /**
     * this function used for calculate total items price
     * @return mixed
     */
    public function price()
    {
        //instead of <code> Cart::where(); </code> , <code> $this->cart->where(); </code>
        $total_price = $this->cart->where('user_id', Auth::id())->get();
        $total = [];
        foreach ($total_price as $item) {
            $total[$item->id] = $item->count * $item->item->price;
        }

        return array_sum($total);
    }
}
