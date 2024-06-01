@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="border rounded product_show_box product-main-img owl-carousel" id="image-carousel">
                            @php
                                $images = $skuData->images->sortByDesc('main_img')->values();
                            @endphp
                            @foreach ($images as $index => $image)
                                <img src="{{ display_img($image->name) }}" alt="Product_Image">
                            @endforeach
                        </div>
                    </div>
                    <!-- Specs And Price -->
                    <div class="col-lg-6">
                        <div class="ps-lg-3">
                            <h4 class="product-title text-dark">
                                {{ $skuData->sku_name }}
                            </h4>
                            <div class="d-flex flex-row my-3">
                                <div class="ar-style">
                                    <i class="bi bi-bookmark-check"></i>
                                    <span class="product_card_precentage">{{ __('home_page.Sold') }}:</span>
                                </div>
                                <span class="text-muted">
                                    <i class="fas fa-shopping-basket fa-sm mx-1"></i>
                                    {{ ucwords($sellerData->name) }}
                                </span>
                                <span class="text-success ml-2 mr-2">{{__('productItem.in_stock')}}</span>
                            </div>
                            <div class="mb-3">
                                <span class="h6">{{__('productItem.EGP')}}:</span>
                                <span class="h3 font-weight-bold"
                                    style="color: #F25E3D;">{{ number_format($product_listing->selling_price, 0, ',', ',') }}</span>
                            </div>
                            <div class="row mt-3">
                                <dt class="col-4">{{ __('productItem.Manufacturer') }}:</dt>
                                <dd class="col-8"><span>{{ $product->manufacturer->name }}</span></dd>

                                <dt class="col-4">{{ __('productItem.Category') }}:</dt>
                                <dd class="col-8"><span>{{ $product->category->name }}</span></dd>

                                <dt class="col-4">{{ __('productItem.SubCategory') }}:</dt>
                                <dd class="col-8"><span>{{ $product->subCategory->name }}</span></dd>
                            </div>
                            <hr />
                            <div class="row mb-4">
                                <form id="add-to-cart-form" class="col-md-12 d-flex justify-content-between"
                                    action="{{ route('user-carts.store', $product_listing->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" id="selected-quantity" value="1">
                                    <!-- Default quantity is 1 -->
                                    <input type="hidden" name="product_sku" value="{{ $sellerData->sku }}">
                                    <!-- Assuming you have the SKU available -->

                                    <div
                                        class="cart-qty btn gradient-f25e3d text-white rounded mr-1 ml-1 d-flex justify-content-between">
                                        <span class="quantity">1</span> <!-- Display default quantity -->
                                        <span class="ml-1 mr-1">{{ __('productItem.QTY') }}</span>
                                    </div>
                                    @auth
                                        <button type="submit" class="btn gradient-8790f6 rounded text-white flex-grow-1 w-100">
                                            <i class="bi bi-bag-check"></i>
                                            {{ __('productItem.Buy_Now') }}
                                        </button>
                                    @else
                                        <a class="SellCarFooterWeb btn gradient-8790f6 rounded text-white flex-grow-1 w-100">
                                            <i class="bi bi-bag-check"></i>
                                            {{ __('productItem.Buy_Now') }}
                                        </a>
                                    @endauth
                                    {{-- <div id="call_nav" class="d-flex align-items-center"
                                        onclick="document.getElementById('carForSaleID').submit();">
                                        <button type="submit" style="border: none; background: none;" class="w-100">
                                            <span
                                                class="col-12 d-flex rounded align-items-center justify-content-center p-2 gradient-8790f6">
                                                <i class='bi bi-bag-check-fill' style='color:#ffffff'></i>
                                                <span class="ml-2 mr-2 font-weight-bold text-white sell-now-text">Buy
                                                    Now</span>
                                            </span>
                                        </button>
                                    </div> --}}
                                </form>
                                <div class="ml-3 mr-4 cart-qty-counts">
                                    <div class="cart-btn"><span class="p-1">1</span></div>
                                    <div class="cart-btn"><span class="p-1">2</span></div>
                                    <div class="cart-btn"><span class="p-1">3</span></div>
                                    <div class="cart-btn"><span class="p-1">4</span></div>
                                    <div class="cart-btn"><span class="p-1">5</span></div>
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
                                        <span>{!! $product->description !!}</span>
                                    </h5>

                                    <table class="table border mt-4 mb-2">
                                        <tr>
                                            <th class="py-2">{{ __('productItem.Manufacturer') }}:</th>
                                            <td class="py-2">{{ $product->manufacturer->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">{{ __('productItem.Name') }}:</th>
                                            <td class="py-2">{{ $skuData->sku_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">{{ __('productItem.Category') }}:</th>
                                            <td class="py-2">{{ $product->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">{{ __('productItem.SubCategory') }}:</th>
                                            <td class="py-2">{{ $product->subCategory->name }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- Other Items -->
                    <div class="col-lg-4 mb-4">
                        <div class="px-0 rounded">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Similar items</h4>
                                    @foreach ($related_products as $related_product)
                                        @foreach ($related_product->skus as $related_sku)
                                            <!-- Check to ensure the related SKU is not the current SKU -->
                                            <div class="d-flex mb-2">
                                                <a
                                                    href="{{ route('product-item', ['seller' => $product_listing->seller->username, 'slug' => $related_sku->product->slug, 'sku' => $related_sku->sku]) }}">
                                                    @foreach ($related_sku->images as $image)
                                                        @if ($image->main_img)
                                                            <img src="{{ display_img($image->name) }}"
                                                                style="width: 100px; height: 100px;"
                                                                class="img-md img-thumbnail product_show_box"
                                                                alt="Similar Item Image">
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <div class="similar-items-info ">
                                                    {{ $related_sku->sku_name }}
                                                    <p class="text-dark font-weight-bold">
                                                        {{__('productItem.EGP')}}: {{ number_format($related_product->selling_price, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Other Items -->
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
        // ----------------- If Not Auth
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Select all buttons with the class 'addToCartButton'
        //     const addToCartButtons = document.querySelectorAll('.addToCartButton');

        //     addToCartButtons.forEach(button => {
        //         button.addEventListener('click', function(event) {
        //             @if (Auth::check())
        //                 // Allow default behavior, which is navigating to the add-to-cart action
        //                 return true;
        //             @else
        //                 event.preventDefault(); // Prevent default navigation
        //                 Swal.fire({
        //                     icon: 'warning',
        //                     title: '{{ __('messages.login_first') }}',
        //                     showConfirmButton: true,
        //                     confirmButtonText: '{{ __('messages.Next') }}',
        //                 });
        //             @endif
        //         });
        //     });
        // });
        // ----------------- QTY
        document.addEventListener('DOMContentLoaded', function() {
            const qtyButton = document.querySelector('.cart-qty');
            const qtyCounts = document.querySelector('.cart-qty-counts');
            const quantity = document.querySelector('.quantity');
            const selectedQuantity = document.getElementById('selected-quantity');

            qtyButton.addEventListener('click', function() {
                qtyCounts.classList.toggle('show');
            });

            qtyCounts.addEventListener('click', function(event) {
                const target = event.target.closest('.cart-btn');
                if (target) {
                    const selectedQty = target.textContent.trim();
                    quantity.textContent = selectedQty;
                    selectedQuantity.value = selectedQty; // Update hidden input value
                    qtyCounts.classList.remove('show');
                }
            });

            // Optional: Close the qty counts if clicking outside
            document.addEventListener('click', function(event) {
                if (!qtyButton.contains(event.target) && !qtyCounts.contains(event.target)) {
                    qtyCounts.classList.remove('show');
                }
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
