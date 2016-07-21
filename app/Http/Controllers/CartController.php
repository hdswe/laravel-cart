<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(){
        $cart = Cart::all();
        return $cart;
    }

    public function show($id){
        $cart = Cart::find($id);
        return $cart;
    }

    public function store(){
        $new_cart = new Cart(); //object
        $new_cart->user_id  =10;
        $new_cart->item_id = 20;
        $new_cart->count = 1001;
        $new_cart->save();
    }

    public function edit(){
        $cart = Cart::find(1);
        $cart->count = 5555;
        $cart->save();
    }

    public function destroy($id){
//        $cart= Cart::find($id);
//        $cart->delete();
        Cart::destroy($id);
    }

    public function myId(){
        $id = Auth::user()->email;
        $id = Auth::user()->name;
        return $id;
    }

}
