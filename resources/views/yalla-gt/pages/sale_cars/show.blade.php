@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="title">
                    <h2 class="section__header--h2">
                        <span>
                            {{ $brand->name }}
                            {{ $model->name }}
                        </span>
                    </h2>
                </div>
                <div class="row">
                    {{-- Image Section --}}
                    <div class="col-md-8 mt-2">
                        <div id="image-carousel" class="owl-carousel">
                            @php
                                $images = $car->images->sortByDesc('main_img')->values();
                            @endphp
                            @foreach ($images as $index => $image)
                                <div class="cover-image ">
                                    <img src="{{ display_img($image->name) }}" alt="">
                                    <button class="btn btn-light btn-icon SaleCarBoxCondition ">
                                        {{ ucwords($condition->name) }}
                                        {{ $car->year }}
                                    </button>
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
                                    <span class="h3 font-weight-bold"
                                        style="color: #F25E3D;">{{ number_format($car->price, 0, ',', ',') }}</span>
                                </div>
                                {{-- POSTED & Location --}}
                                <div class="card-text-4 mt-2">
                                    <i class="bi bi-stopwatch"></i> POSTED
                                    <span class="h6">{{ $car->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="card-text-4 mt-2 mb-3">
                                    <i class="bi bi-geo-alt"></i> Location
                                    <span class="h6">{{ $governorate->name }}</span>
                                </div>
                                {{-- Call Details --}}
                                <div class="mt-4 d-flex justify-content-between">
                                    <a href="https://wa.me/20{" target="__blank" class="btn btn-outline-secondary rounded">
                                        <i class="bi bi-person-check"></i>
                                        {{ getFirstName($car->user_name) }}
                                    </a>
                                    <a href="https://wa.me/20{" target="__blank"
                                        class="btn btn-outline-success rounded flex-grow-1 mr-1 ml-1">
                                        <i class="bi bi-whatsapp"></i>
                                        Whatsapp
                                    </a>
                                </div>
                                <div class="mt-3  btn gradient-8790f6 text-white rounded w-100 call-btn"
                                    data-phone="{{ $car->phone }}">
                                    <i class="bi bi-telephone mr-2 ml-2"></i>
                                    <span class="call-text">Call Now</span>
                                </div>
                            </div>
                        </div>
                        {{-- SEFTY CARD --}}
                        <div class="card mt-2">
                            <div class="card-body">
                                <h4>Your safety matters to us!</h4>
                                <ul>
                                    <li class="mt-1">- Only meet in public / crowded places for example metro stations and
                                        malls.</li>
                                    <li class="mt-1">- Never go alone to meet a buyer / seller, always take someone with
                                        you.</li>
                                    <li class="mt-1">- Check and inspect the product properly before purchasing it.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- Other Specs & Price --}}
                    <div class="col-lg-8 mt-2 mb-4">
                        <div class="border rounded px-3 py-2 bg-white">
                            <label class="mt-4 p-2 h4 rounded bg-light">
                                <i class='bx bx-bookmarks'></i>
                                {{ __('gt_cars_create.Description') }}</label>

                            <!-- Pills content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    {{-- CONTECT --}}
                                    <h5 class="mt-4">
                                        <span>{!! $car->description !!}</span>
                                    </h5>
                                    {{-- SPECS --}}
                                    <table class="table border mt-4 mb-2">
                                        <tr>
                                            <th class="py-2">Brand:</th>
                                            <td class="py-2">{{ $brand->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Model:</th>
                                            <td class="py-2">{{ $model->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Engine CC:</th>
                                            <td class="py-2">{{ $cc->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Condition:</th>
                                            <td class="py-2">{{ ucwords($condition->name) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Body Shape:</th>
                                            <td class="py-2">{{ $BodyShape->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Color:</th>
                                            <td class="py-2">{{ $color->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Transmission:</th>
                                            <td class="py-2">{{ $transmission->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Fuel Type:</th>
                                            <td class="py-2">{{ $fuelType->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">Aspiration:</th>
                                            <td class="py-2">{{ $aspiration->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="py-2">kilometer:</th>
                                            <td class="py-2">{{ $km->name }}</td>
                                        </tr>
                                        <table class="table">
                                            <!-- Other rows for car details -->
                                            <tr>
                                                <th class="py-2">Features:</th>
                                            </tr>
                                            <tr>
                                                <td class="py-2" colspan="2">
                                                    @if ($features->isEmpty())
                                                        No features available.
                                                    @else
                                                        <div class="features-box">
                                                            @foreach ($features as $feature)
                                                                <span class="feature-tag">{{ $feature->name }}</span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>


                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- END OF CONTENT --}}
                </div>
                @include('yalla-gt.partials.choose_sale_car')
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
        // ----------------------------SHOW PHONE NUMBER
        document.addEventListener('DOMContentLoaded', function() {
            const callButtons = document.querySelectorAll('.call-btn');

            callButtons.forEach(function(button) {
                let phoneNumberShown = false;

                button.addEventListener('click', function() {
                    const phoneNumber = button.getAttribute('data-phone');
                    if (!phoneNumberShown) {
                        const span = document.createElement('span');
                        span.classList.add('phone-number');
                        span.textContent = phoneNumber;
                        button.appendChild(span);
                        phoneNumberShown = true;

                        // Hide the "Call" text
                        const callText = button.querySelector('.call-text');
                        if (callText) {
                            callText.style.display = 'none';
                        }
                    } else {
                        // If exists and it's the second click, trigger a phone call
                        window.location.href = 'tel:' + phoneNumber;
                    }
                });
            });
        });
    </script>
@endsection
