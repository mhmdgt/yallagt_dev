<div>
    <div class="card">
        <div class="card-body p-4">
            <div class="row">
                {{-- Items --}}
                <div class="col-lg-7">
                    {{-- NAV --}}
                    <div class="cart-nav">
                        <h5 class=""><a href="" class="text-body">
                                <i class="bi bi-arrow-left-short"></i>
                                Continue Shopping</a>
                        </h5>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="mb-1">Shopping cart</p>
                                <p class="mb-0">You have 5 items in your cart</p>
                            </div>
                        </div>
                    </div>
                    {{-- Items --}}
                    @foreach ($cart as $cartItem)
                        @if ($cartItem->UserCartItems->isNotEmpty())
                            @foreach ($cartItem->UserCartItems as $item)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="product-media">
                                                    <a class="primary_img d-flex justify-content-center" href="#">
                                                        @if ($item->productSku && $item->productSku->images)
                                                            @foreach ($item->productSku->images as $image)
                                                                @if ($image->main_img)
                                                                    <div style="width: 100px;">
                                                                        <img src="{{ display_img($image->name) }}"
                                                                            alt="">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    </a>
                                                </div>
                                                <div class="prod-details">
                                                    <div class="cart-prod-brand">Manufacturer:
                                                        @if ($item->productSku && $item->productSku->product && $item->productSku->product->manufacturer)
                                                            <span>{{ $item->productSku->product->manufacturer->name }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="cart-prod-title">{{ $item->productSku->sku_name }}</div>
                                                    <div class="cart-prod-attributes">
                                                        <div class="mt-2">
                                                            <span>EGP:</span>
                                                            <span class="product_card_price" style="color: #F25E3D;">
                                                                @if ($item->productListing)
                                                                    {{ number_format($item->productListing->selling_price, 0, ',', ',') }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prod-ctrl">
                                            {{-- <div class="cart-btn" wire:click="removeCartItem({{ $item->id }})">
                                                <i class="bi bi-trash"></i>
                                                <span>Remove</span>
                                            </div> --}}
                                            <div class="remove">
                                                <button type="button" class="cart-btn" wire:loading.attr="disabled" wire:click="removeCartItem({{ $item->id }})">
                                                    <span wire:loading.remove wire:target="removeCartItem({{ $item->id }})">
                                                        <i class="bi bi-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removeCartItem({{ $item->id }})">
                                                        <i class="bi bi-trash"></i> Removeing
                                                    </span>
                                                </button>
                                            </div>
                                            {{-- QTY --}}
                                            {{-- <div class="cart-btn cart-qty"
                                                onclick="toggleQtyCounts({{ $item->id }})">
                                                <span>{{ $item->qty }} QTY</span>
                                            </div>
                                            <div class="cart-qty-counts" id="qty-counts-{{ $item->id }}"
                                                style="display: none;">
                                                @for ($i = 1; $i <= 5; $i++)
                                                <div class="cart-btn"
                                                onclick="updateQty({{ $item->id }}, {{ $i }})"><span
                                                class="p-1">{{ $i }}</span></div>
                                                @endfor
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                {{-- Order Summary --}}
                <div class="col-lg-5">
                    <div class="summary summary-cart">
                        <h4 class="summary-title mt-4 h5 text-dark">
                            <i class='bx bx-check-circle'></i>
                            Order Summary
                            <span class="gt-gray" style="font-size: 12px">(Inclusive of VAT)</span>
                        </h4>

                        <table class="table table-summary">
                            <tbody>
                                <tr class="summary-subtotal">
                                    <td class="h6 text-dark">
                                        Subtotal: {{ $cart->isNotEmpty() ? $cart->first()->total_qty : 0 }} items
                                    </td>
                                    <td>
                                        EGP:
                                        {{ $cart->isNotEmpty() ? number_format($cart->first()->sub_total, 0, ',', ',') : '0' }}
                                    </td>

                                </tr>
                                <tr class="summary-shipping">
                                    <td class="h6 text-dark">Shipping Fee:</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr class="summary-shipping-row">
                                    <td>Standard:</td>
                                    <td class="gt-green font-weight-bold">FREE</td>
                                </tr>

                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleShipping"
                                                wire:model="shipping">
                                            <label class="custom-control-label" for="toggleShipping">Couriers</label>
                                        </div>
                                    </td>
                                    <td>EGP: 50.00</td>
                                </tr>

                                <tr class="summary-total">
                                    <td class="h4 text-dark">Total:</td>
                                    <td class="h5 text-dark">EGP: 160.00</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- Buy now Web --}}
                        <a href="#" class="btn gradient-8790f6 rounded text-white w-100">
                            PROCEED TO CHECKOUT
                        </a>

                    </div>
                </div>
                {{-- END --}}
            </div>
        </div>
    </div>
</div>
