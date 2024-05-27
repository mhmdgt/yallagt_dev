@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item">Product Listings</li>
                </ol>
                <a href="{{ route('product-listings.add') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Product
                </a>
            </div>
        </nav>
        {{-- ========================== Brand Table ==========================  --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Listings</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Seller</th>
                                        <th>Storehouse</th>
                                        <th>Brand</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        {{-- <th>IMG</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sellersStock as $seller)
                                        @foreach ($seller->storehouses as $storehouse)
                                            @foreach ($storehouse->productListings as $productListing)
                                                @foreach ($productListing->skus as $sku)
                                                    <tr>
                                                        <td>{{ $productListing->id }}</td>
                                                        <td>{{ $storehouse->seller->name }}</td>
                                                        <td>{{ $storehouse->name }}</td>
                                                        <td>{{ $sku->product->manufacturer->name}}</td>
                                                        <td>{{ $sku->sku_name  }}</td>
                                                        <td>{{ $sku->sku }}</td>
                                                        <td>{{ $productListing->qty}}</td>
                                                        <td>{{ $productListing->selling_price }}</td>
                                                        {{-- <td>
                                                            @foreach ($sku->images as $image)
                                                                @if ($image->main_img)
                                                                    <img src="{{ display_img($image->name) }}"
                                                                        class="image-in-box" alt="Main Image">
                                                                @endif
                                                            @endforeach
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </tbody>


                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
