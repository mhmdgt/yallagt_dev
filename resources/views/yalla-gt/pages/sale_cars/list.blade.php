@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        <div class="row">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="d-flex align-items-center mb-4">
                    <h3 class="detailedSearch__header--h3">{{__('home_page.Search_Results')}}</h3>
                    <div class=" mr-2 btn text-white rounded gradient-green-bg">
                        {{ $brandData->name }}
                    </div>
                </div>
                {{-- Cars --}}
                <div class="d-block">
                    <div class="row gy-3">
                        @foreach ($brandModels as $model)
                            @foreach ($model->saleCars as $car)
                                <div class="col-md-4 mb-4">
                                    <a class="text-dark" href="{{ route('sale-car.show', $car->getTranslation('slug', getCurrentLocale()) )  }}">
                                        <div class="card">
                                            {{-- image --}}
                                            <div>
                                                <div class="card-img-container">
                                                    @foreach ($car->images as $image)
                                                        @if ($image->main_img)
                                                            <img src="{{ display_img($image->name) }}" class="card-img-top"
                                                                alt="No_IMG">
                                                            <button
                                                                class="btn btn-light btn-icon stockCarImageEdit ar-style">
                                                                {{ ucwords($conditions[$car->condition]) }}
                                                                {{ $car->year }}
                                                            </button>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="card-body container-fluid">
                                                <h4 class="card-text" dir="auto">
                                                    <span>{{ $brandData->name }}</span>
                                                    <span>{{ $model->name }}</span>
                                                </h4>

                                                <h3 class="card-text-h3 mt-3">
                                                    <span class="h5 text-dark">{{ __('home_page.EGP') }}</span>
                                                    <span class="gt-orange font-weight-bold">
                                                        {{ number_format($car->price, 0, ',', ',') }}</span>
                                                </h3>
                                                <div class="card-text-4 mt-3 mb-2" dir="auto">
                                                    <i class="bi bi-geo-alt"></i> <span
                                                        class="h6">{{ $governorates[$car->governorate] }}</span>
                                                </div>
                                                <div class="card-text-4 mt-2 mb-3" dir="auto">
                                                    <i class="bi bi-stopwatch"></i>
                                                    <span class="h6">{{ $car->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="detailedSearch__content--badge row no-gutters card-text-4"
                                                    style="display:flex; flex-direction:column">
                                                    <span class="badge badge_icon_5">{{ $engineKms[$car->km] }}</span>
                                                    <span
                                                        class="badge mt-2">{{ $transmissions[$car->transmission] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
                {{-- END --}}
                @include('yalla-gt.partials.choose_sale_car')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
