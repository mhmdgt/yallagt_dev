<div class="row">
    @if (empty($cartItems))
        <div class="row align-items-center mt-5 mb-5">
            <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                <h2 class="font-weight-light">Your ad is free now</h2>
                <p class="font-italic text-muted mb-4">"Win With Us at Yallagt, Sell your car, hassle-free and commission-free. Our platform offers you the opportunity to list your vehicle without any fees, ensuring a seamless selling experience. Take advantage of our commitment to providing a transparent and cost-effective solution for selling your car. Join our community today and let's win together."
                </p>
                <a href="{{ route('gt_car.create') }}" class="btn btn-light px-5 rounded-pill shadow-sm">Sell You Car</a>
            </div>
            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{ asset('yalla_gt/media/about_us/4136944.png') }}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
    @else
        <div class="col-lg-7">
            <div class="cart-nav">
                <h5 class=""><a href="" class="text-body">
                    <i class="bi bi-arrow-left-short"></i>
                    Continue Shopping</a>
                </h5>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <p class="mb-1">Shopping cart</p>
                        <p class="mb-0">You have {{ $cart->total_qty }} items in your cart</p>
                    </div>
                </div>
            </div>
            @foreach ($cartItems as $index => $cartItem)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="product-media">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                      
                                        @foreach ($cartItem['product_sku']['images'] as $image)
                                            @if ($image['main_img'])
                                                <div style="width: 100px;">
                                                    <img src="{{ display_img($image['name']) }}" alt="">
                                                </div>
                                            @endif
                                        @endforeach
                                    </a>
                                </div>
                                <div class="prod-details">
                                 
                                    <div class="cart-prod-brand">
                                      
                                    </div>
                                   
                                    <div class="cart-prod-title">{{ $cartItem['product_sku']['sku_name'][app()->getLocale()] }}</div>
                                    <div class="cart-prod-attributes">
                                        <div class="mt-2">
                                            <span>EGP:</span>
                                            <span class="product_card_price" style="color: #F25E3D;">
                                                {{ number_format($cartItem['product_sku']['listings'][0]['selling_price'], 0, ',', ',') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="prod-ctrl">
                            <div class="cart-btn" wire:click="remove({{ $cartItem['id'] }})">
                                <i class="bi bi-trash"></i>
                                <span>Remove</span>
                            </div>
                            <div class="cart-btn cart-qty">
                                <h1>{{ $cartItem['qty'] }}</h1>
                                <input type="number" wire:model.defer="cartItems.{{ $index }}.qty" wire:keyup="change" min="1">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                            <td class="h6 text-dark">Subtotal: ({{ $cart->total_qty }} items)</td>
                            <td>EGP: {{ number_format($cart->sub_total, 0, ',', ',') }}</td>
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
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                    <label class="custom-control-label" for="standart-shipping">Couriers:</label>
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
                <a href="{{ route('checkout.index') }}" class="btn gradient-8790f6 rounded text-white w-100">
                    PROCEED TO CHECKOUT
                </a>
            </div>
        </div>
    @endif
</div>
