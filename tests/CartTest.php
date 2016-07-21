<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     *
     */
    public function testExample()
    {
        $new_cart = new \App\Cart();
        $new_cart->user_id = 1;
        $new_cart->item_id = 15;
        $new_cart->count = 10;
        $new_cart->save();
    }
}
