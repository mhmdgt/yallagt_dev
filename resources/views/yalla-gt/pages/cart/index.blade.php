@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div rtl-direction">
    {{-- START --}}
        <div class="card">
            <div class="card-body p-4">
                <div class="row">
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
                                    <p class="mb-0">You have 4 items in your cart</p>
                                </div>
                            </div>
                        </div>
                        {{-- Items --}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="product-media">
                                            <a class="primary_img d-flex justify-content-center" href="#">
                                                <img class="product-image" src="yalla_gt/media/product_imgs/1688582470.webp"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="prod-details">
                                            <div class="cart-prod-brand">Shell <span>256GB, Navy Blue</span></div>
                                            <div class="cart-prod-title">Shell Helix HX8 Synthetic 5W-40</div>
                                            <div class="cart-prod-attributes">
                                                <div class="p-0">
                                                    <div>
                                                        <span>EGP</span>
                                                        <span class="cart-prod-title">9,999</span>
                                                    </div>
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
                                        <span>Quantity</span>
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
                    </div>

                    <div class="col-lg-5">
                        <div class="summary summary-cart">
                            <h4 class="summary-title mt-2">
                                <i class='bx bx-check-circle'></i>
                                Order Summary
                            </h4>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>$160.00</td>
                                    </tr>
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free
                                                    Shipping</label>
                                            </div>
                                        </td>
                                        <td>$0.00</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="standart-shipping">Standart:</label>
                                            </div>
                                        </td>
                                        <td>$10.00</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div>
                                        </td>
                                        <td>$20.00</td>
                                    </tr>

                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>$160.00</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="checkout.html" class="gradient-green-bg cart-btn btn btn-order btn-block text-white">
                                PROCEED TO CHECKOUT
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    {{-- END --}}
    </div>
@endsection
{{-- ====== include ====== --}}
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
