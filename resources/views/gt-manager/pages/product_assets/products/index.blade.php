@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Stock Car Brands</li>
                </ol>
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create Product
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
                                        <th>Image</th>
                                        <th>Product Name <span class="text-danger">(EN)</span></th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Manufacturer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $index => $product)
                                        @foreach ($product->skus as $sku)
                                            <tr>
                                                <td>
                                                    @foreach ($product->images as $image)
                                                        @if ($image->main_img)
                                                            <img src="{{ asset('storage/media/product_imgs/' . $image->path . '/' . $image->name) }}"
                                                                class="image-in-box" alt="No_IMG">
                                                        @break
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $sku->main_price }}</td>
                                            <td>{{ $sku->sku }}</td>
                                            <td>{{ $product->manufacturer->name }}</td>
                                            <td>
                                                <div class="position-relative">
                                                    <!-- Dropdown button positioned at top-left corner -->
                                                    <div class="dropdown">
                                                        <button class="btn p-1" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icon-lg text-muted pb-3px"
                                                                data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('products.edit', $product->slug) }}">
                                                                <i data-feather="edit-2" class="icon-sm mr-2"></i>
                                                                <span class="">Edit</span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="">
                                                                <i data-feather="folder-plus" class="icon-sm mr-2"></i>
                                                                <span>Download</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
