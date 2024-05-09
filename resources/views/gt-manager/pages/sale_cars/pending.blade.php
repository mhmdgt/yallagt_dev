@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Pending Ads</li>
                </ol>
                {{-- ====== Create button ====== --}}
                <a href="{{ route('sale-car.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create
                </a>
            </div>
        </nav>
        {{-- ========================== Brand Table ==========================  --}}
        <div class="row">
            {{-- Loop Starts --}}
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- image --}}
                        <div>
                            <div class="card-img-container">
                                @foreach ($car->images as $image)
                                    @if ($image->main_img)
                                        <img src="{{ asset('storage/media/sale_car_imgs/' . $image->path . '/' . $image->name) }}"
                                            class="card-img-top" alt="No_IMG">
                                            <a href="{{route('sale-car.edit' , $car->slug)}}">
                                                <button class="btn btn-light btn-icon stockCarImageEdit">
                                                    <i data-feather="edit"></i>
                                                </button>
                                            </a>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- Detalis --}}
                        <div class="card-body">
                            <h4 class="card-text">
                                {{ ucwords($conditions[$car->condition]) }}
                                {{ $brands[$car->brand] }}
                                {{ $models[$car->model] }}
                                {{ $car->year }}
                            </h4>

                            <h4 class="card-text text-primary mt-2">
                                <span class="h5 text-dark">{{ __('EGP:') }} </span>{{ number_format($car->price) }}
                            </h4>

                            <div class="card-text mt-4">
                                <span class="badge bg-light p-2 h6">
                                    <i class="bi bi-speedometer2"></i>
                                    {{ $kms[$car->km] }}
                                </span>
                                <span class="badge bg-light p-2 h6">
                                    <i class="bi bi-gear-wide-connected"></i>
                                    {{ $transmissions[$car->transmission] }}
                                </span>
                            </div>

                            <div class="card-text mt-4">
                                <i class="bi bi-geo-alt"></i>
                                <span class="badge_icon mr-2 h6">{{ $governorates[$car->governorate] }}</span>
                                <i class="bi bi-calendar-check"></i>
                                <span class="badge_icon_second mr-2 h6">{{ $car->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        {{-- Contorllers --}}
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('sale-car.approve-car', $car->slug) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="bi bi-bookmark-check"></i>
                                            <span class="ml-2">Approve</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('sale-car.decline-car', $car->slug) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-block">
                                            <i class="bi bi-x-octagon"></i>
                                            <span class="ml-2">Decline</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Loop End --}}
        </div>

    </div>
@endsection
