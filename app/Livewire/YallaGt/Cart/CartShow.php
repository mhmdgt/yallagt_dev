<?php

namespace App\Livewire\YallaGt\Cart;


use Livewire\Component;
use App\Models\UserCart;
use App\Models\UserCartItem;
use Illuminate\Support\Facades\Log;

class CartShow extends Component
{
    public $cart;
    public $shipping = false;


    public function removeItem($itemId)
    {
        Log::info("removeItem called with ID: " . $itemId); // Add this line for debugging
        $item = UserCartItem::find($itemId);
        if ($item) {
            $item->delete();
            $this->emit('refreshCart');
        }
    }


    public function render()
    {
        $userId = auth()->user()->id;

        $this->cart = UserCart::where('user_id', $userId)
            ->with('UserCartItems.productListing', 'UserCartItems.productSku.images')
            ->get();

        // dd($this->cart);

        return view('livewire.yalla-gt.cart.cart-show', [
            'cart' => $this->cart,
            'shipping' => $this->shipping,
        ]);
    }


}
