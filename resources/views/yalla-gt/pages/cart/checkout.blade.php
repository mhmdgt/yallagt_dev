@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div rtl-direction">
        <div class="row">
            <div class="col-lg-7">
                {{-- Address --}}
                <div class="p-2 mb-2 text-dark d-flex align-items-center ar-style">
                    <i class="bi bi-geo-alt ml-1 mr-1"></i>
                    <span style="font-size: 24px; font-weight: 500;">Shipping Address</span>
                </div>
                <div class="card mb-4 ar-style">
                    <div class="card-body">
                        <a href="#" class="edit-link">Change Address</a>
                        <div class="row mt-3">
                            <dt class="col-4">Name:</dt>
                            <dd class="col-8" dir="auto"><span>Muhammed</span></dd>

                            <dt class="col-4">Phone:</dt>
                            <dd class="col-8"><span>01110120316</span></dd>

                            <dt class="col-4">Governorate:</dt>
                            <dd class="col-8"><span>GIZA</span></dd>

                            <dt class="col-4">Full Address:</dt>
                            <dd class="col-8" dir="auto"><span>39 Nasr El-Thawara st, Haram, Giza</span></dd>
                        </div>
                    </div>
                </div>
                {{-- Your Order --}}
                <div class="p-2 mb-2 text-dark d-flex align-items-center ar-style">
                    <i class="bi bi-bag-check ml-1 mr-1"></i>
                    <span style="font-size: 24px; font-weight: 500;">Your order</span>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="product-media">
                                    <a class="primary_img d-flex justify-content-center" href="#">
                                        <div style="width: 100px;">
                                            <img src="#" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="prod-details">
                                    <div class="cart-prod-brand">Amsoil</div>
                                    <div class="cart-prod-title">Shell 5W40 Ultra 4L (SKU_NAME)</div>
                                    <div class="cart-prod-attributes">
                                        <div class="mt-2">
                                            <span>EGP:</span>
                                            <span class="product_card_price" style="color: #F25E3D;">
                                                {{ number_format(9000, 0, ',', ',') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Order Summary --}}
            <div class="col-lg-5">
                <div class="card mb-4 p-1">
                    <div class="card-body">
                        <div class="summary summary-cart">

                            <h4 class="summary-title h5 text-dark">
                                <i class='bx bx-check-circle'></i>
                                Order Summary
                                <span class="gt-gray h6">Incl. VAT</span>
                            </h4>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td class="h6 text-dark">Subtotal: (2items)</td>
                                        <td>EGP: {{ number_format(10000, 0, ',', ',') }}</td>
                                    </tr>
                                    <tr class="summary-shipping">
                                        <td class="h6 text-dark">Shipping Fee:</td>
                                        <td class="gt-green font-weight-bold">FREE</td>
                                    </tr>
                                    <tr class="summary-shipping">
                                        <td class="h6 text-dark">Payment:</td>
                                        <td class="tex-tdark">
                                            <i class='bx bx-wallet'></i>
                                            Cash On Delivery
                                        </td>
                                    </tr>


                                    <tr class="summary-total">
                                        <td class="h4 text-dark">Total</td>
                                        <td class="h5">EGP: 160.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- Buy now Web --}}
                            <a href="checkout.html" class="btn gradient-8790f6 rounded text-white w-100">
                                {{-- class="btn gradient-8790f6 rounded text-white flex-grow-1 d-none d-lg-block"> --}}
                                PLACE ORDER
                            </a>
                            {{-- Buy now Mobile --}}
                            {{-- <div id="call_nav" class="d-flex align-items-center"
                                onclick="document.getElementById('carForSaleID').submit();">
                                <span
                                    class="col-12 d-flex rounded align-items-center justify-content-center p-2 gradient-8790f6">
                                    <button type="button" style="border: none; background: none;">
                                        <span class="ml-2 mr-2 font-weight-bold text-white sell-now-text">PLACE ORDER</span>
                                    </button>
                                </span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
