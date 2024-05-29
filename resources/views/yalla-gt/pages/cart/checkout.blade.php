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
                                <input type="hidden" name="addressName" value="{{ $address->name }}">

                                <dt class="col-4">Phone:</dt>
                                <dd class="col-8"><span>{{ $address->phone }}</span></dd>
                                <input type="hidden" name="addressPhone" value="{{ $address->phone }}">

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
                        <div class="card-body ar-style">
                            {{-- Title --}}
                            <div class="p-2 mb-4 text-dark ar-style">
                                <span style="font-size: 22px; font-weight: 500;">New Address</span>
                                <p class="mt-2 gt-gray">Add your shipping address for fast and easy checkout across
                                    our marketplaces</p>
                            </div>
                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
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
                        </div>
                    </div>
                @endif
                {{-- Your Order --}}
                <div class="p-2 mb-2 text-dark d-flex align-items-center ar-style">
                    <i class="bi bi-bag-check ml-1 mr-1"></i>
                    <span style="font-size: 24px; font-weight: 500;">Your order</span>
                </div>
                @foreach ($cart->UserCartItems as $cartItem)
                    <div class="card mb-4">
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
                                        <div>
                                            <span>Brand:</span>
                                            <span>{{ $cartItem->productSku->product->manufacturer->name }}</span>
                                        </div>
                                        <div class="cart-prod-title">
                                            <div class="text-dark">
                                                {{ $cartItem->productSku->sku_name }}
                                            </div>
                                        </div>
                                        <div class="cart-prod-attributes">
                                            <div class="mt-2">
                                                <span>EGP:</span>
                                                <span class="product_card_price" style="color: #F25E3D;">
                                                    <td>{{ number_format($cartItem->productListing->selling_price, 0, ',', ',') }}
                                                    </td>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prod-ctrl d-flex">
                                    <div class="cart-item">
                                        <div class="cart-btn cart-qty">
                                            <span>{{ $cartItem->qty }} Quantity</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        <td class="h6 text-dark">Subtotal: ({{ $cart->total_qty }} items)</td>
                                        <td>EGP: {{ number_format($cart->sub_total, 0, ',', ',') }}</td>
                                    </tr>
                                    <form action="{{ route('checkout.store') }}" method="POST">

                                        <tr class="summary-shipping">
                                            <td class="h6 text-dark">Shipping Fee:</td>
                                            <td> </td>
                                        </tr>

                                        <input type="hidden" name="shippingServiceId" id="shippingServiceId"
                                            value="{{ $shippingServices[0]->id }}">

                                        @foreach ($shippingServices as $key => $service)
                                            @php
                                                $serviceName = $service->getTranslations('name')['en'];
                                                $checked = $key === 0 ? 'checked' : '';
                                            @endphp
                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="radio" name="shippingService"
                                                            class="custom-control-input shipping-service"
                                                            id="toggleShipping{{ $service->id }}"
                                                            value="{{ $service->fee }}" {{ $checked }}
                                                            data-id="{{ $service->id }}">
                                                        <label class="custom-control-label"
                                                            for="toggleShipping{{ $service->id }}">{{ $serviceName }}</label>
                                                    </div>
                                                </td>
                                                <td>EGP:
                                                    {{ $service->fee == 0 ? 'Free' : number_format($service->fee, 0, '', ',') }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr class="summary-total">
                                            <td class="h4 text-dark">Total:</td>
                                            <td class="h5 text-dark" id="totalAmount">EGP:
                                                <span>{{ number_format($cart->sub_total + $shippingServices[0]->fee, 0, '', ',') }}</span>
                                            </td>
                                        </tr>


                                        <tr class="summary-shipping">
                                            <td class="h6 text-dark">Payment:</td>
                                            <td class="text-dark"><i class='bx bx-wallet'></i>
                                                {{ ucwords($paymentMethods->name) }}
                                            </td>
                                        </tr>

                                        <input type="hidden" name="payment_method_id" id="paymentMethod"
                                            value="{{ $paymentMethods->id }}">
                                        <input type="hidden" name="paymentMethod" id="paymentMethod"
                                            value="{{ ucwords($paymentMethods->getTranslations('name')['en']) }}">

                                </tbody>
                            </table>
                            {{-- Buy now Web --}}
                            @if (!$address)
                                <button type="submit" class="btn gradient-8790f6 rounded text-white w-100">
                                    PLACE ORDER
                                </button>
                            @else
                                {{-- <a href="{{ route('checkout.store') }}"
                                    class="btn gradient-8790f6 rounded text-white w-100">
                                    PLACE ORDER
                                </a> --}}
                                @csrf
                                <!-- Your form fields here -->
                                <button type="submit" class="btn gradient-8790f6 rounded text-white w-100">Place
                                    Order</button>
                                </form>
                            @endif
                            </form>
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
@endsection
@section('script')
    <script>
        let previousFee = {{ $shippingServices[0]->fee }};
        let currentShippingServiceId = {{ $shippingServices[0]->id }};

        // Get all radio buttons with class 'shipping-service'
        const shippingRadios = document.querySelectorAll('.shipping-service');
        const totalAmountSpan = document.getElementById('totalAmount').querySelector('span');
        const shippingServiceIdInput = document.getElementById('shippingServiceId');


        // Add event listener to each radio button
        shippingRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Get the selected shipping service ID and fee
                const selectedId = parseInt(this.dataset.id);
                const selectedFee = parseFloat(this.value);

                // Update the hidden input values
                shippingServiceIdInput.value = selectedId;

                // Update the total amount display
                const currentTotal = parseFloat(totalAmountSpan.innerText.replace(/,/g, ''));
                const newTotal = currentTotal - previousFee + selectedFee;
                totalAmountSpan.innerText = newTotal.toLocaleString();

                // Update previous fee and current shipping service ID
                previousFee = selectedFee;
                currentShippingServiceId = selectedId;
            });
        });
    </script>
@endsection
