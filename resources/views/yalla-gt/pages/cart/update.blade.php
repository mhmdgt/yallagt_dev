v class="page-div rtl-direction">
        @if (!$cart)
            <!-- Case: No Cart -->
            <div class="row align-items-center mb-4" style="margin-top: 10px">
                <div class="col-lg-6 order-2 order-lg-1">
                    <i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h3 class="font-weight-light mt-3 mb-2">{{ __('aboutus.Looking_For_Spare_Parts') }}</h3>
                    <p class="text-muted mt-2 mb-4">{{ __('aboutus.Looking_For_Spare_Parts_Content') }}</p>
                    <a href="{{ route('product.manufacturers-index') }}"
                        class="btn gradient-8790f6 text-white px-5 rounded-pill shadow-sm">{{ __('aboutus.Shop_Now') }}</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2">
                    <img src="{{ asset('yalla_gt/media/cart/empty_cart.png') }}" alt=""
                        class="img-fluid mb-4 mb-lg-0">
                </div>
            </div>
        @elseif ($cart && $cart->UserCartItems->isEmpty())
            <!-- Case: Cart Exists but No Items in the Cart -->
            <div class="row align-items-center mb-4" style="margin-top: 10px">
                <div class="col-lg-6 order-2 order-lg-1">
                    <i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h3 class="font-weight-light mt-3 mb-2">{{ __('aboutus.Looking_For_Spare_Parts') }}</h3>
                    <p class="text-muted mt-2 mb-4">{{ __('aboutus.Looking_For_Spare_Parts_Content') }}</p>
                    <a href="{{ route('product.manufacturers-index') }}"
                        class="btn gradient-8790f6 text-white px-5 rounded-pill shadow-sm">{{ __('aboutus.Shop_Now') }}</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2">
                    <img src="{{ asset('yalla_gt/media/cart/empty_cart.png') }}" alt=""
                        class="img-fluid mb-4 mb-lg-0">
                </div>
            </div>
        @else
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
                                        <p class="mb-0">You have {{ $totalQty }} items in your cart</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Items --}}
                            @foreach ($cart->UserCartItems as $cartItem)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="product-media">
                                                    <a class="primary_img d-flex justify-content-center" href="#">
                                                        @foreach ($cartItem->productSku->images as $image)
                                                            @if ($image->main_img)
                                                                <div style="width: 100px;">
                                                                    <img src="{{ display_img($image->name) }}"
                                                                        alt="">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </a>
                                                </div>
                                                <div class="prod-details">
                                                    <div>
                                                        <span>Brand:</span>
                                                        <span>{{ $cartItem->productSku->product->manufacturer->name }}</span>
                                                    </div>
                                                    <div class="cart-prod-title">
                                                        <div class="text-dark">
                                                            {{ $cartItem->productSku->sku_name }}
                                                        </div>
                                                    </div>
                                                    <div class="ar-style">
                                                        <i class="bi bi-bookmark-check"></i>
                                                        <span
                                                            class="product_card_precentage">{{ __('home_page.Sold') }}:</span>
                                                            <span>{{ ucwords($cartItem->productListing->seller->name) }}</span>
                                                    </div>
                                                    <div class="cart-prod-attributes">
                                                        <div class="mt-2">
                                                            <span>EGP:</span>
                                                            <span class="product_card_price" style="color: #F25E3D;">
                                                                <td>
                                                                    {{ number_format($cartItem->productListing->selling_price, 0, ',', ',') }}
                                                                </td>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- CONTROLLER --}}
                                        <div class="prod-ctrl d-flex align-items-center">
                                            {{-- Remove --}}
                                            <div type="button" class="cart-remove-btn" data-toggle="modal"
                                                data-target="#confirmDeleteModal{{ $cartItem->id }}" title="Edit">
                                                <i class="bi bi-trash"></i>
                                                Remove
                                            </div>
                                            <x-modal.confirm-delete-modal
                                                route="{{ route('user-carts.remove', $cartItem->id) }}"
                                                id="{{ $cartItem->id }}" />
                                            {{-- QTY --}}
                                            <div class="ml-2 mr-2 cart-item">
                                                <div class="cart-btn cart-qty">
                                                    <span>{{ $cartItem->qty }} Quantity</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-qty-counts">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="cart-btn" data-cart-item-id="{{ $cartItem->id }}"
                                                    data-quantity="{{ $i }}"><span
                                                        class="p-1">{{ $i }}</span></div>
                                            @endfor
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
                                            <td class="h6 text-dark">Subtotal: ({{ $totalQty }} items)</td>
                                            <td>EGP: {{ number_format($subtotal, 0, '', ',') }}</td>
                                        </tr>
                                        <tr class="summary-shipping">
                                            <td class="h6 text-dark">Shipping Fee:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>Standard:</td>
                                            <td class="gt-green font-weight-bold">FREE</td>
                                        </tr>

                                        <tr class="summary-total">
                                            <td class="h4 text-dark">Total:</td>
                                            <td class="h5 text-dark" id="totalAmount">EGP:
                                                <span>{{ number_format($subtotal, 0, '', ',') }}</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                {{-- Buy now Web --}}
                                <a href="{{ route('checkout.index') }}"
                                    class="btn gradient-8790f6 rounded text-white w-100">
                                    {{-- class="btn gradient-8790f6 rounded text-white flex-grow-1 d-none d-lg-block"> --}}
                                    Buy Now
                                </a>
                                {{-- Buy now Mobile --}}
                                {{-- <div id="call_nav" class="d-flex align-items-center"
                                    onclick="document.getElementById('carForSaleID').submit();">
                                    <span
                                        class="col-12 d-flex rounded align-items-center justify-content-center p-2 gradient-8790f6">
                                        <button type="button" style="border: none; background: none;">
                                            <span class="ml-2 mr-2 font-weight-bold text-white sell-now-text">PROCEED TO
                                                CHECKOUT</span>
                                        </button>
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif