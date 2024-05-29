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
                <a href="{{ route('product-listings.create') }}" class="btn btn-success">
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
                                        <th>Brand</th>
                                        <th>Sku Name</th>
                                        <th>SKU</th>
                                        <th>Selling Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_listings as $productListing)
                                        @foreach ($productListing->skus as $sku)
                                            <tr>
                                                <td>{{ $productListing->id }}</td>
                                                <td>{{ $productListing->seller->name ?? 'N/A' }}</td>
                                                <td>{{ $sku->product->manufacturer->name ?? 'N/A' }}</td>
                                                <td>{{ $sku->sku_name ?? 'N/A' }}</td>
                                                <td>{{ $sku->sku }}</td>
                                                <td>{{ number_format($productListing->selling_price, 0, ',', ',') }}</td>
                                            </tr>
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
