@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="d-flex align-items-center mb-4">
                    <h3 class="detailedSearch__header--h3">Detailed Search</h3>
                    <div class=" mr-2 btn text-white rounded gradient-green-bg">
                        <a href="{{route('product.manufacturers-index')}}" class="text-white">
                        Products
                    </a>
                    </div>
                </div>
                {{-- All Products --}}
                <section class="product_area product_deals">
                    <div class="product_container">
                        <div class="row product_carousel no-gutters" id="shop_filter">


                            @foreach ($product_listings as $product_listing)
                                @foreach ($product_listing->skus as $sku)
                                    <div class="col-md-20 col-6 product_item">
                                        <article class="single_product">
                                            <figure>
                                                <a class="text-dark"
                                                    href="{{ route('product-item', ['seller' => $product_listing->seller->username, 'slug' => $sku->product->slug, 'sku' => $sku->sku]) }}">
                                                    <div class="container-fluid product_thumb">
                                                        @foreach ($sku->images as $image)
                                                            @if ($image->main_img)
                                                                <img src="{{ display_img($image->name) }}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="product_card_content">
                                                        <div class="mt-4 mb-4">
                                                            <h6 class="brand fw-700">Brand:
                                                                <span>{{ $sku->product->manufacturer->name }}</span>
                                                            </h6>
                                                            <h4 class="product_name home-blog-title">
                                                                {{ $sku->sku_name }}</h4>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="p-0">
                                                                <div>
                                                                    <span>EGP:</span>
                                                                    <span class="product_card_price"
                                                                        style="color: #F25E3D;">
                                                                        {{ number_format($product_listing->selling_price, 0, ',', ',') }}
                                                                    </span>
                                                                </div>
                                                                <div class="ar-style">
                                                                    <i class="bi bi-bookmark-check"></i>
                                                                    <span
                                                                        class="product_card_precentage">{{ __('home_page.Sold') }}:</span>
                                                                    <span>{{ $product_listing->seller->name }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="p-0 product_card_cart">
                                                                <form action="{{ route('user-carts.store', $product_listing->id ) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="addToCartButton">
                                                                        <img src="{{asset('yalla_gt/media/cart/cart_icon.png')}}" alt="Cart Icon">
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figure>
                                        </article>
                                    </div>
                                @endforeach
                            @endforeach


                            <!-- loop end here -->

                        </div>
                    </div>
                </section>
                {{-- END --}}
            </div>
        </div>
        @include('yalla-gt.partials.choose_sale_car')
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
