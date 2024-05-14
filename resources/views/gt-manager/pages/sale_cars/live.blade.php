@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Cars for sale</li>
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
                                        <a href="{{ route('sale-car.edit', $car->slug) }}">
                                            <button class="btn btn-light btn-icon stockCarImageEdit">
                                                <i data-feather="edit"></i>
                                            </button>
                                        </a>
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

                            <h4 class="card-text text-primary mt-1">
                                <span class="h5 text-dark">EGP: </span>
                                {{ number_format($car->price, 0, ',', ',') }}
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
                                <div class="col-9">
                                    <button type="button" class="btn btn-success btn-block call-btn"
                                        data-phone="{{ $car->phone }}">
                                        <i class="mr-2 bi bi-telephone"></i>
                                        <span class="call-text">Call</span>
                                    </button>
                                </div>
                                <div class="col-3">
                                    <form action="{{ route('sale-car.decline-car', $car->slug) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-block">
                                            <i class="bi bi-x-octagon"></i>
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


@section('script')
    <script>
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
