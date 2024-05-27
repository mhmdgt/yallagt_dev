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
                @if ($address)
                    <div class="card mb-4 ar-style">
                        <div class="card-body">
                            <a href="#" class="edit-link">Change Address</a>
                            <div class="row mt-3">
                                <dt class="col-4">Name:</dt>
                                <dd class="col-8" dir="auto"><span>{{ $address->name }}</span></dd>

                                <dt class="col-4">Phone:</dt>
                                <dd class="col-8"><span>{{ $address->phone }}</span></dd>

                                <dt class="col-4">City:</dt>
                                <dd class="col-8"><span>{{ $address->governorate->name ?? 'N/A' }}</span></dd>

                                <dt class="col-4">Address:</dt>
                                <dd class="col-8" dir="auto"><span>{{ $address->full_address }}</span></dd>

                                <dt class="col-4">Type:</dt>
                                <dd class="col-8" dir="auto"><span>{{ $address->type }}</span></dd>
                                @if ($address->gps_link)
                                    <dt class="col-4">GPS Link:</dt>
                                    <dd class="col-8"><span><a href="{{ $address->gps_link }}"
                                                target="_blank">{{ $address->gps_link }}</a></span></dd>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mb-4 ar-style">
                        <div class="card-body mb-4 ar-style">
                            {{-- Title --}}
                            <div class="p-2 mb-4 text-dark ar-style">
                                <span style="font-size: 22px; font-weight: 500;">New Address</span>
                                <p class="mt-2 gt-gray">Add your shipping address for fast and easy checkout across
                                    our marketplaces</p>
                            </div>
                            {{-- Form --}}
                            {{-- <form action="{{ route('user.addressStore') }}" method="POST" enctype="multipart/form-data">
                                @csrf --}}
                            {{-- Contact Data --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h6 class="card-title">Type</h6>
                                    <div class="form-check form-check-inline border rounded p-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                id="optionsRadios5" value="home">
                                            Home
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline border rounded p-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                id="optionsRadios6" value="work">
                                            Work
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ user_data()->name }}">
                                    <x-errors.display-validation-error property="name" />
                                </div>
                                <div class="col">
                                    <label for="exampleInputPhone1">Phone number</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ user_data()->phone }}">
                                    <x-errors.display-validation-error property="phone" />
                                </div>
                            </div>
                            {{-- Address Data --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>{{ __('gt_cars_create.Governorate') }}</label>
                                    <select class="js-example-basic-single w-100" name="governorate_id">
                                        <option value="">{{ __('gt_cars_create.select') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}"
                                                {{ old('governorate') == $governorate->id ? 'selected' : '' }}>
                                                {{ $governorate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-errors.display-validation-error property="governorate" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area" value="">
                                    <x-errors.display-validation-error property="area" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Building number</label>
                                    <input type="text" class="form-control" name="building_number">
                                    <x-errors.display-validation-error property="building_number" />
                                </div>

                                <div class="col">
                                    <label>Street</label>
                                    <input type="text" class="form-control" name="street" value="">
                                    <x-errors.display-validation-error property="street" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Full Address</label>
                                    <input type="text" class="form-control" name="full_address" value="">
                                    <x-errors.display-validation-error property="full_address" />
                                </div>
                            </div>

                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>GPS Link <span>( Location )</span></label>
                                    <input type="url" class="form-control" name="gps_link" value="">
                                    <x-errors.display-validation-error property="gps_link" />
                                </div>
                            </div>

                            {{-- <button type="submit"
                                    class="btn btn-light mt-2 rounded gradient-green-bg text-white float-right">
                                    <i class="bi bi-bookmark-check"></i>
                                    Save
                                </button> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                @endif
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
                <hr>
            </div>
            {{-- Order Summary --}}
            <div class="col-lg-5 mt-4">
                <div class="card p-1">
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
    <div class="mb-5">
        @include('yalla-gt.layout.upper-footer')
    </div>
    {{-- @include('yalla-gt.layout.footer') --}}
@endsection
