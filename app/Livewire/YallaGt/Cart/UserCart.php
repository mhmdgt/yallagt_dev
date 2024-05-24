<?php

namespace App\Livewire\YallaGt\Cart;

use Livewire\Component;
use App\Models\UserCartItem;
use App\Models\UserCart as Cart;


class UserCart extends Component
{

    public $cart;
    public $cartItems = [];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = Cart::with([
            'userCartItems.productSku.images' => function ($query) {
                $query->where('main_img', true);
            },
            'userCartItems.productSku.listings',
            'userCartItems'
        ])->whereUserId(auth()->id())->first();

        if ($this->cart) {
            $this->cartItems = $this->cart->userCartItems->toArray();
        } else {
            $this->cartItems = [];
        }
    }

    public function findCartItem($id)
    {
        dd($id);
        return UserCartItem::find($id);
    }

    public function change()
    {
        dd('gg');
       ;
      
    }

    public function remove($id)
    {
        $cartItem = $this->findCartItem($id);
        if ($cartItem) {
            $cartItem->delete();
            $this->loadCart();
        }
    }

    public function render()
    {
        return view('livewire.yalla-gt.cart.user-cart', ['cart' => $this->cart]);
    }
}