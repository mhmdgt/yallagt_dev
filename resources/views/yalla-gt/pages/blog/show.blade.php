@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4 ar-style">
                        <h2 class="fw-bolder mb-1 blog_title_name">
                            {{ $blog->title }}</h2>
                        <div class="text-muted fst-italic mt-4 mb-2">Posted on {{ $blog->created_at }}</div>
                    </header>
                    <!-- Preview image figure-->
                    <div class="card-img-container-blog-header">
                        @foreach ($blog->images as $image)
                            @if ($image->main_img)
                                <img class="card-img-top" src="{{ display_img($image->name) }}">
                            @endif
                        @endforeach
                    </div>
                    <!-- Post categories-->
                    <div class="mt-4 mb-4 ar-style">
                        <a class="p-2 bg-light rounded"
                            style="font-size: 12px; font-weight: 400;">{{ __('gt_cars_create.Description') }}</a>
                        <a class="p-2 bg-light rounded"
                            style="font-size: 12px; font-weight: 400;">{{ __('gt_cars_create.Description') }}</a>
                    </div>
                    <!-- Post content-->
                    <div class="mb-5" style="font-size: 18px; line-height: 1.8;">
                        {!! $blog->content !!}
                    </div>
                </article>
            </div>
            {{-- END --}}
            @include('yalla-gt.partials.choose_sale_car')
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
@section('script')
    <script>
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
                onInitialized: adjustImageSize,
                onRefreshed: adjustImageSize,
                navText: [
                    "<i class='bx bxs-chevron-left-circle' style='color:#ffefef; font-size: 32px;'></i>",
                    "<i class='bx bxs-chevron-right-circle' style='color:#ffefef; font-size: 32px;'></i>"
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
        });
    </script>
@endsection
