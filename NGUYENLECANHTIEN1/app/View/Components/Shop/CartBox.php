<?php

namespace App\View\Components\Shop;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class CartBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $count = Cart::count();
        $total = Cart::total();
        return view('components.shop.cart-box', compact('count', 'total'));
    }
}
