@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            {{-- All Blogs --}}
            <div class="col-lg-8">
                {{-- Title --}}
                <div class="d-flex align-items-center mb-4">
                    <h3 class="detailedSearch__header--h3">Detailed Search</h3>
                    <button class=" mr-2 btn text-white rounded gradient-green-bg">
                        Car Blogs
                    </button>
                </div>
                {{-- Content --}}
                <div class="choose_container mt-4">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="{{ route('blog-post', $featuredBlog->slug) }}">
                            <div class="card-img-container-blog-header">
                                @if ($featuredBlogImage)
                                    <img class="card-img-top" src="{{ display_img($featuredBlogImage->name) }}"
                                        alt="Blog Image" />
                                @endif
                            </div>
                            <div class="card-body detailedSearch__content--card-price">
                                <div class="text-muted fst-italic mb-2">Posted on {{ $featuredBlog->created_at }}</div>
                                <h4 class="card-title text-dark home-blog-title" style="font-size: 20px; font-weight: 600;">
                                    {{ $featuredBlog->title }}
                                </h4>

                            </div>
                        </a>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        @foreach ($remainingBlogs as $blog)
                            <div class="col-lg-6">
                                <a href="{{ route('blog-post', $blog->slug) }}">
                                    <div class="card mb-4">
                                        <div class="card-img-container">
                                            @php
                                                $blogMainImage = $blog->images->firstWhere('main_img', '1');
                                            @endphp
                                            @if ($blogMainImage)
                                                <img class="card-img-top" src="{{ display_img($blogMainImage->name) }}"
                                                    alt="Blog Image" />
                                            @endif
                                        </div>
                                        <div class="d-lfex detailedSearch__content--card-price">
                                            <div class="mt-2 mb-3 text-dark home-blog-title"
                                                style="font-size: 20px; font-weight: 600;">
                                                {{ $blog->title }}
                                            </div>
                                            <h4 class="gt-orange">
                                                <div class="text-muted fst-italic mb-2">
                                                    <i class="ml-auto mr-2 bi bi-stopwatch"></i>
                                                    <span>Posted on {{ $blog->created_at->diffForHumans() }}</span>
                                                </div>
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination-->
                    <div class="d-flex justify-content-center">
                        {{-- {{ $blogs->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
            <!-- END-->
            @include('yalla-gt.partials.choose_sale_car_vertical')
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
