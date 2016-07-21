## Synopsis

this project add items with different type to my cart

## Code Example

 $new_cart = $this->cart->newInstance();
            $new_cart->user_id = Auth::id();
            $new_cart->item_id = $item_id;
            $new_cart->count = $quantity;
            $new_cart->save();

## Motivation

to learn more about laravel and join to bootcamp


## Tests

Describe and show how to run the tests with code examples.

## Code Example

 public function testExample()
    {
        $new_cart = new \App\Cart();
        $new_cart->user_id = 1;
        $new_cart->item_id = 15;
        $new_cart->count = 10;
        $new_cart->save();
    }


