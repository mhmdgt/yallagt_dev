@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">All New Orders</a></li>
                    <li class="breadcrumb-item">New Order</li>
                </ol>
            </div>
        </nav>
        <div class="profile-page tx-13">
            <div class="row profile-body">
                {{-- ====== Order Details ====== --}}
                <div class="col-md-4 col-xl-4 left-wrapper mb-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">Order Details</h6>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Created at:</label>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Tracking Num:</label>
                                <td>{{ $order->tracking_num }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Name:</label>
                                <td>{{ $order->name }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Phone Numer:</label>
                                <td>{{ $order->phone }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Shipping EGP:</label>
                                <td>{{ number_format($order->shipping_service_fee, 0, ',', ',') }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Total EGP:</label>
                                <td>{{ number_format($order->total_price, 0, ',', ',') }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Governorate:</label>
                                <td>{{ $governorates[$order->governorate_id] ?? 'N/A' }}</td>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Full Address:</label>
                                <td>{{ $order->full_address }}</td>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded mt-4">
                        <div class="card-body">
                            <h6 class="card-title">Shippment Details</h6>
                            <Form action="{{ route('orders.processing-order' , $order->tracking_num) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group row pt-0">
                                    <div class="col">
                                        <div>
                                            <label>Shipping Company</label>
                                            <select id="brandSelect" class="js-example-basic-single w-100" name="company_id">
                                                <option>Select Company</option>
                                                @foreach ($shippingCompanies as $company)
                                                    <option value="{{ $company->id }}" @selected(old('brand') == $company->id)>
                                                        {{-- {{ old('brand') == $brand->id ? 'selected' : '' }}> --}}
                                                        {{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-errors.display-validation-error property="company_id" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Shipment code</label>
                                    <input type="text" class="form-control" name="Shipment_code">
                                </div>
                                <button class="btn btn-success mt-4 float-right" type="submit">Activate</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- ========================== All items ==========================  --}}
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h6 class="card-title">Order Items</h6>
                                        <table id="orderItemsTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Seller Name</th>
                                                    <th>Seller Phone</th>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->OrderItems as $index => $item)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $item->productListing->seller->name }}</td>
                                                        <td>{{ $item->productListing->seller->phone }}</td>
                                                        <td>{{ $item->productSku->sku_name }}</td>
                                                        <td>{{ $item->sku }}</td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td>EGP
                                                            {{ number_format($item->total_price_per_item, 0, ',', ',') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection