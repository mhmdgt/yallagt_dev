@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="title">
                    <h2 class="section__header--h2">
                        <span>
                            {{ $brandData->name }}
                            {{ $brandModel->name }}
                            {{ $stockCar->year }}
                        </span>
                    </h2>
                </div>
                {{-- Car --}}
                <div class="row">
                    {{-- Image Section --}}
                    <div class="col-md-8 mt-2">
                        <div id="image-carousel" class="owl-carousel">
                            @php
                                $images = $stockCar->images->sortByDesc('main_img')->values();
                            @endphp
                            @foreach ($images as $index => $image)
                                <div class="cover-image ">
                                    <img src="{{ display_img($image->name) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Contact Details --}}
                    <div class="col-md-4 mt-2 sale_car_contact_details">
                        <div class="card">
                            <div class="card-body">
                                {{-- PRICE --}}
                                <div class="mb-3">
                                    <span class="h6">EGP:</span>
                                    <span class="h3 font-weight-bold" style="color: #F25E3D;">
                                        {{ number_format($lowest_category->price, 0, ',', ',') }}
                                    </span>
                                </div>
                                {{-- POSTED & Location --}}
                                <h4 class="card-text-4 mt-2">
                                    <i class="bi bi-bookmark-star"></i> Category:
                                    {{ $lowest_category->name }}
                                </h4>
                                @if (!empty($stockCar->brochure))
                                    <div class="mt-3 btn gradient-8790f6 text-white rounded w-100">
                                        <i class="bi bi-file-earmark-arrow-down mr-2 ml-2"></i>
                                        <span class="call-text">Download Brouchure</span>
                                    </div>
                                @endif
                                @if (empty($stockCar->brochure))
                                    <div class="mt-3 p-2 text-center gradient-8790f6 text-white rounded w-100">
                                        <span class="call-text">Brouchure is not available</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Other Categories --}}
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="mb-3 btn gradient-green-bg text-white rounded call-btn">
                                    <span>All Categories:</span>
                                </div>
                                <table class="table border mb-2">
                                    @foreach ($stockCar->stockCarCategories as $category)
                                        <tr>
                                            <th class="">{{ $category->name }}</th>
                                            <td>EGP: {{ number_format($category->price, 0, ',', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Other Specs & Price --}}
                    <div class="col-lg-8 mt-2 mb-4">
                        <div class="border rounded px-3 py-2 bg-white">
                            <label class="mt-4 p-2 h4 rounded bg-light">
                                <i class='bx bx-bookmarks'></i>
                                {{ __('gt_cars_create.Description') }}
                            </label>
                            <!-- Pills content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    {{-- SPECS --}}
                                    <table class="table border mt-4 mb-2">
                                        <tr>
                                            <th class="py-2">Brand:</th>
                                            <td class="py-2">{{ $brandData->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Model:</th>
                                            <td class="py-2">{{ $brandModel->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Transmission:</th>
                                            <td class="py-2">{{ $transmissionType->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Transmission Speeds:</th>
                                            <td class="py-2">{{ $lowest_category->transmission_speed }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Engine CC:</th>
                                            <td class="py-2">{{ $engineCapacitie->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Aspiration:</th>
                                            <td class="py-2">{{ $enginAspiration->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Cylinders:</th>
                                            <td class="py-2">{{ $lowest_category->cylinder }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Horsepower:</th>
                                            <td class="py-2">{{ $lowest_category->horsepower }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Newton meter:</th>
                                            <td class="py-2">{{ $lowest_category->newton_meter }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Maximum Speed:</th>
                                            <td class="py-2">{{ $lowest_category->maximum_speed }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Acceleration (0-100):</th>
                                            <td class="py-2">{{ $lowest_category->acceleration }}</td>
                                        </tr>
                                        {{-- BODY --}}
                                        <tr>
                                            <th class="py-2">Body Shape:</th>
                                            <td class="py-2">{{ $bodyShape->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Number of seats:</th>
                                            <td class="py-2">{{ $lowest_category->number_of_seat }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Rims Size:</th>
                                            <td class="py-2">{{ $lowest_category->rims_size }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Trunk Size:</th>
                                            <td class="py-2">{{ $lowest_category->trunk_size }}</td>
                                        </tr>
                                        {{-- Fuel --}}
                                        <tr>
                                            <th class="py-2">Fule Type:</th>
                                            <td class="py-2">{{ $fuelType->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Fuel Consumption:</th>
                                            <td class="py-2">{{ $lowest_category->fuel_consumption }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Fuel Tank Capacity:</th>
                                            <td class="py-2">{{ $lowest_category->fuel_tank_capacity }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                {{-- END OF CONTENT --}}
                @include('yalla-gt.partials.choose_sale_car')
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
        //---------------------- Image carousel
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
                    "<i class='bx bxs-chevron-left-circle left-nav' style='color:#ffefef; font-size: 32px;'></i>",
                    "<i class='bx bxs-chevron-right-circle right-nav' style='color:#ffefef; font-size: 32px;'></i>"
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
