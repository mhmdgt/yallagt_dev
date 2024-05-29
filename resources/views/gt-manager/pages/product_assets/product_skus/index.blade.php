@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
                </ol>
                <a href="{{ route('product-skus.create', $product->slug) }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create SKU
                </a>
            </div>
        </nav>
        {{-- ====== Product Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <span class="profile-name ml-3 h4">{{ $product->name }}</span>
                            <td>
                                <a href="{{ route('products.edit', $product->slug) }}">
                                    <button class="btn btn-inverse-warning ml-4 mr-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== Product SKUS ====== --}}
        <div class="row">
            @foreach ($product->skus as $sku)
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sukGenerator" name="sku" required
                                            value="{{ $sku->sku }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="sku_name_en" readonly
                                        value="{{ $sku->getTranslations('sku_name')['en'] }}">
                                    <x-errors.display-validation-error property="sku_name_en" />
                                </div>
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="sku_name_ar" dir="auto" readonly
                                        value="{{ $sku->getTranslations('sku_name')['ar'] }}">
                                    <x-errors.display-validation-error property="sku_name_ar" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Part Number / OEM</label>
                                    <input type="text" class="form-control" autocomplete="off" name="part_number"
                                        readonly value="{{ $sku->part_number }}">
                                    <x-errors.display-validation-error property="part_number" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Main price</label>
                                    <input type="main_price" class="form-control" name="main_price" readonly value="{{ number_format($sku->main_price, 0, ',', ',') }}">
                                    <x-errors.display-validation-error property="main_price" />
                                </div>
                            </div>
                            <div class="rounded mt-3 p-2">
                                @php
                                    // Reorder the images array so that the main image comes first
                                    $images = $sku->images->sortByDesc('main_img')->values();
                                @endphp
                                @foreach ($images as $index => $image)
                                    <div class="img-container position-relative" >
                                        <img src="{{ display_img($image->name) }}"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('product-skus.edit', $sku->sku) }}" class="text-white">
                                <button class="btn btn-success float-right" type="submit">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        // ---------------------------------------- Carousel
        $(document).ready(function() {
            var owl = $('#image-carousel').owlCarousel({
                loop: false,
                margin: 10,
                slideBy: 2,
                nav: false,
                navText: ["<i class='bi bi-arrow-left-circle-fill'></i>",
                    "<i class='bi bi-arrow-right-circle-fill'></i>"
                ],
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                        slideBy: 2
                    },
                    600: {
                        items: 3,
                        slideBy: 3
                    },
                    1000: {
                        items: 6,
                        slideBy: 5
                    }
                }
            });
        });
    </script>
@endsection --}}
