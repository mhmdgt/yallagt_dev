@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($single_listing->skus as $sku)
                        {{-- @foreach ($product_listing->skus as $sku) --}}
                        {{-- Image Section --}}
                        <div class="col-md-4">
                            <div class="border rounded mb-3 owl-carousel product_show_box product-main-img img-fluid"
                                id="image-carousel">
                                @php
                                    $images = $sku->images->sortByDesc('main_img')->values();
                                @endphp
                                @foreach ($images as $index => $image)
                                    <div>
                                        <img src="{{ display_img($image->name) }}" alt="Product_Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Specs And Price -->
                        <div class="col-lg-6">
                            <div class="ps-lg-3">
                                <h4 class="product-title text-dark">
                                    {{ $sku->sku_name }}
                                </h4>
                                <div class="d-flex flex-row my-3">
                                    <div class="text-warning mb-1 me-2">
                                        <span class="ms-1">
                                            4.5
                                        </span>
                                    </div>
                                    <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>HOT
                                        DEALS</span>
                                    <span class="text-success ml-2">In stock</span>
                                </div>
                                <div class="mb-3">
                                    <span class="h6">EGP:</span>
                                    <span class="h3 font-weight-bold"
                                        style="color: #F25E3D;">{{ number_format($single_listing->selling_price, 0, ',', ',') }}</span>
                                </div>
                                <div class="row mt-3">
                                    <dt class="col-4">Manufacturer:</dt>
                                    <dd class="col-8"><span>{{ $sku->product->manufacturer->name }}</span></dd>

                                    <dt class="col-4">Category:</dt>
                                    <dd class="col-8"><span>{{ $sku->product->category->name }}</span></dd>

                                    <dt class="col-4">SubCategory:</dt>
                                    <dd class="col-8"><span>{{ $sku->product->subCategory->name }}</span></dd>
                                </div>
                                <hr />
                                {{-- Add To Cart  --}}
                                <div class="row mb-4">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="btn btn-outline-secondary rounded mr-1 ml-1">
                                            <i class="bi bi-caret-down"></i>
                                            <span class="cart-qty">Quantity</span>
                                        </div>
                                        {{-- Buy now Web --}}
                                        <a href="#"
                                            class="btn gradient-8790f6 rounded text-white flex-grow-1 d-none d-lg-block">
                                            Add To Cart
                                        </a>
                                        {{-- Buy now Mobile --}}
                                        <div id="call_nav" class="d-flex align-items-center"
                                            onclick="document.getElementById('carForSaleID').submit();">
                                            <span
                                                class="col-12 d-flex rounded align-items-center justify-content-center p-2 gradient-8790f6">
                                                <button type="button" style="border: none; background: none;">
                                                    <i class='bi bi-bag-check-fill' style='color:#ffffff'></i>
                                                    <span class="ml-2 mr-2 font-weight-bold text-white sell-now-text">Buy
                                                        Now</span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4 mr-4 cart-qty-counts">
                                        <div class="cart-btn">
                                            <span>1</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>2</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>3</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>4</span>
                                        </div>
                                        <div class="cart-btn">
                                            <span>5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="col-lg-8 mb-4">
                            <div class="mb-4 border rounded px-3 py-2 bg-white">
                                <label class="mt-4 p-2 h4 rounded bg-light">
                                    <i class='bx bx-bookmarks'></i>
                                    {{ __('gt_cars_create.Description') }}</label>
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                        aria-labelledby="ex1-tab-1">
                                        <h5 class="mt-4">
                                            <span>{!! $sku->product->description !!}</span>
                                        </h5>

                                        <table class="table border mt-4 mb-2">
                                            <tr>
                                                <th class="py-2">Display:</th>
                                                <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                                            </tr>
                                            <tr>
                                                <th class="py-2">Processor capacity:</th>
                                                <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                                            </tr>
                                            <tr>
                                                <th class="py-2">Camera quality:</th>
                                                <td class="py-2">720p FaceTime HD camera</td>
                                            </tr>
                                            <tr>
                                                <th class="py-2">Memory</th>
                                                <td class="py-2">8 GB RAM or 16 GB RAM</td>
                                            </tr>
                                            <tr>
                                                <th class="py-2">Graphics</th>
                                                <td class="py-2">Intel Iris Plus Graphics 640</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            @include('yalla-gt.partials.choose_sale_car')
                        </div>
                        <!-- Samilier Items -->
                        <div class="col-lg-4 mb-4">
                            <div class="px-0  rounded">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Similar items</h4>

                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp"
                                                    style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                            </a>
                                            <div class="similar-items-info">
                                                <a href="#" class="mb-1">
                                                    Rucksack Backpack Large <br />
                                                    Line Mounts
                                                </a>
                                                <p class="text-dark font-weight-bold"> $38.90</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp"
                                                    style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                            </a>
                                            <div class="similar-items-info">
                                                <a href="#" class="mb-1">
                                                    Rucksack Backpack Large <br />
                                                    Line Mounts
                                                </a>
                                                <p class="text-dark font-weight-bold"> $38.90</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp"
                                                    style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                            </a>
                                            <div class="similar-items-info">
                                                <a href="#" class="mb-1">
                                                    Rucksack Backpack Large <br />
                                                    Line Mounts
                                                </a>
                                                <p class="text-dark font-weight-bold"> $38.90</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp"
                                                    style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                            </a>
                                            <div class="similar-items-info">
                                                <a href="#" class="mb-1">
                                                    Rucksack Backpack Large <br />
                                                    Line Mounts
                                                </a>
                                                <p class="text-dark font-weight-bold"> $38.90</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
@section('script')
    <script>
        // ----------------- QTY
        document.addEventListener('DOMContentLoaded', function() {
            const qtyButton = document.querySelector('.cart-qty');

            qtyButton.addEventListener('click', function() {
                const qtyCounts = document.querySelector('.cart-qty-counts');
                qtyCounts.classList.toggle('show');
            });
        });
        // ----------------- Image Carousel
        $(document).ready(function() {
            // Initialize Owl Carousel
            var owl = $('#image-carousel').owlCarousel({
                loop: false,
                nav: true, // Enable navigation arrows
                autoplay: false,
                autoplayTimeout: 8000,
                items: 1,
                dots: false,
                // Callback function to adjust image size and centering
                onInitialized: function(event) {
                    adjustImageSize(event);
                    updateNavButtons(event);
                },
                onRefreshed: function(event) {
                    adjustImageSize(event);
                    updateNavButtons(event);
                },
                onChanged: updateNavButtons,
                navText: [
                    "<i class='bx bxs-chevron-left left-nav' style='color:#23272a; font-size: 32px;'></i>",
                    "<i class='bx bxs-chevron-right right-nav' style='color:#23272a; font-size: 32px;'></i>"
                ]
            });

            // Function to adjust image size and centering
            function adjustImageSize(event) {
                var $currentItem = $(event.target).find('.owl-item.active');
                var $currentImage = $currentItem.find('.cover-image img');

                if ($currentImage.length > 0) {
                    var containerWidth = $currentItem.width();
                    var containerHeight = $currentItem.height();
                    var imageRatio = $currentImage.width() / $currentImage.height();
                    var containerRatio = containerWidth / containerHeight;

                    if (imageRatio > containerRatio) {
                        $currentImage.css({
                            'width': 'auto',
                            'height': '100%'
                        });
                    } else {
                        $currentImage.css({
                            'width': '100%',
                            'height': 'auto'
                        });
                    }

                    $currentImage.css({
                        'position': 'absolute',
                        'left': '50%',
                        'top': '50%',
                        'transform': 'translate(-50%, -50%)'
                    });
                }
            }

            // Function to update navigation buttons visibility
            function updateNavButtons(event) {
                var itemCount = event.item.count; // Total number of items
                var currentIndex = event.item.index; // Current item index

                // Show both arrows by default
                $('.left-nav').show();
                $('.right-nav').show();

                // Hide the left arrow if it's the first item
                if (currentIndex === 0) {
                    $('.left-nav').hide();
                }

                // Hide the right arrow if it's the last item
                if (currentIndex === itemCount - 1) {
                    $('.right-nav').hide();
                }
            }
        });
    </script>
@endsection
