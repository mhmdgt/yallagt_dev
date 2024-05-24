<?php

namespace App\Livewire\YallaGt\Cart;

use Livewire\Component;
use App\Models\UserCart as Cart;

class UserCart extends Component
{

    public $cart;
    public $total;
    public function mount(){
        $this->cart = Cart::all();
        $this->total = Cart::count();
    }
    public function increment($id)
    {
        $cart = Cart::find($id);
        $cart->increment('quantity');
        $this->emit('refreshCart');
    }

    public function decrement($id)
    {
        $cart = Cart::find($id);
        $cart->decrement('quantity');
        $this->emit('refreshCart');
    }
    public function destroy($id)
    {
        Cart::destroy($id);
        $this->emit('refreshCart');
    }

    public function remove($id)
    {
        Cart::findOrFail($id)->delete();
    }





    public function render()
    {
        return view('livewire.yalla-gt.cart.user-cart');
    }
}
