@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Storehouses</li>
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
                        <h6 class="card-title">All Brands</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>IMG</th>
                                        <th>Brand</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Merchant</th>
                                        <th>Where</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_listings as $product_listing)
                                        @foreach ($product_listing->skus as $sku)
                                            <tr>
                                                <td>{{ $product_listing->id }}</td>
                                                {{-- Add code to display SKU main image --}}
                                                <td>
                                                    @foreach ($sku->images as $image)
                                                        @if ($image->main_img)
                                                            <img src="{{ asset('storage/media/product_sku_imgs/' . $image->path . '/' . $image->name) }}"
                                                                class="image-in-box" alt="Main Image">
                                                        @endif
                                                    @endforeach
                                                </td>
                                                {{-- End of SKU main image code --}}
                                                <td>{{ optional($manufacturers[$product_listing->id])->name }}</td>
                                                <td>{{ optional($products[$product_listing->id])->name }}</td>
                                                <td>{{ $sku->sku }}</td>
                                                <td>{{ optional($storehouses[$product_listing->id])->merchant }}</td>
                                                <td>{{ optional($storehouses[$product_listing->id])->name }}</td>
                                                <td>{{ $product_listing->qty }}</td>
                                                <td>{{ $product_listing->selling_price }}</td>
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
