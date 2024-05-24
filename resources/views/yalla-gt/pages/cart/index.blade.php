@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div rtl-direction">
        @if ($cart == null )
            <div class="row align-items-center mt-4 mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Looking For Spare Parts?</h2>
                    <p class="font-italic text-muted mb-4">"Look no further! At Yallagt,
                        we've got you covered. Explore our online store for a wide range of spare parts, all
                        conveniently
                        available for purchase directly from us. With our same-day delivery service, you can get the
                        parts
                        you need delivered to your doorstep as quickly as possible. Trust us to provide high-quality
                        parts
                        and fast service, so you can get back on the road in no time."
                    </p>
                    <a href="{{route('product.manufacturers-index')}}" class="btn gradient-8790f6 text-white px-5 rounded-pill shadow-sm">Shop Now</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                        src="{{ asset('yalla_gt/media/cart/empty_cart.png') }}" alt=""
                        class="img-fluid mb-4 mb-lg-0"></div>
            </div>
        @else
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    {{-- If nooooooo Items --}}
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
                                    <p class="mb-0">You have {{ $cart->total_qty }} items in your cart</p>
                                </div>
                            </div>
                        </div>
                        {{-- Items --}}
                        @foreach ($cartItems as $cartItem)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="product-media">
                                                <a class="primary_img d-flex justify-content-center" href="#">
                                                    @foreach ($cartItem->productSku->images as $image)
                                                        @if ($image->main_img)
                                                            <div style="width: 100px;">
                                                                <img src="{{ display_img($image->name) }}" alt="">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </a>
                                            </div>
                                            <div class="prod-details">
                                                <div class="cart-prod-brand">{{ $cartItem->productSku->brand }}
                                                    <span>{{ $cartItem->productSku->attributes }}</span>
                                                </div>
                                                <div class="cart-prod-title">{{ $cartItem->productSku->sku_name }}</div>
                                                <div class="cart-prod-attributes">
                                                    <div class="mt-2">
                                                        <span>EGP:</span>
                                                        <span class="product_card_price" style="color: #F25E3D;">
                                                            {{ number_format($listing->selling_price, 0, ',', ',') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="prod-ctrl">
                                        <div class="cart-btn">
                                            <i class="bi bi-trash"></i>
                                            <span>Remove</span>
                                        </div>
                                        <div class="cart-btn cart-qty">
                                            <span>{{ $cartItem->qty }} QTY</span>
                                            <i class="bi bi-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="cart-qty-counts">
                                        <div class="cart-btn">
                                            <span>1</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>2</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>3</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>4</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                <input type="radio" id="standart-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="standart-shipping">Couriers:</label>
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
                            <a href="{{ route('checkout.index') }}" class="btn gradient-8790f6 rounded text-white w-100">
                                {{-- class="btn gradient-8790f6 rounded text-white flex-grow-1 d-none d-lg-block"> --}}
                                PROCEED TO CHECKOUT
                            </a>
                            {{-- Buy now Mobile --}}
                            {{-- <div id="call_nav" class="d-flex align-items-center"
                                onclick="document.getElementById('carForSaleID').submit();">
                                <span
                                    class="col-12 d-flex rounded align-items-center justify-content-center p-2 gradient-8790f6">
                                    <button type="button" style="border: none; background: none;">
                                        <span class="ml-2 mr-2 font-weight-bold text-white sell-now-text">PROCEED TO CHECKOUT</span>
                                    </button>
                                </span>
                            </div> --}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyButton = document.querySelector('.cart-qty');

            qtyButton.addEventListener('click', function() {
                const qtyCounts = document.querySelector('.cart-qty-counts');
                qtyCounts.classList.toggle('show');
            });
        });
    </script>
@endsection
