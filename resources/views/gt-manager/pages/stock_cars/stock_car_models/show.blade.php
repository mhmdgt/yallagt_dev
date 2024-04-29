@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('stock-car.index') }}">Stock Brands</a></li>
                    <li class="breadcrumb-item">{{ $brandData->name }}</li>
                </ol>
                {{-- ====== Create button ====== --}}
                {{-- <a  href="{{ route('stock-car.update', ['brandSlug' => $brandSlug, 'modelSlug' =>'-', 'stockYear' => '-']) }}"> --}}
                <a href="{{ route('stock-car.create', $brandData->slug) }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create Model
                </a>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <div class="row gy-3">
            @foreach ($brandModels as $model)
                @foreach ($model->StockCars as $stockCar)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            {{-- image --}}
                            <div>
                                <div class="card-img-container">
                                    @foreach ($stockCar->images as $image)
                                        @if ($image->main_img)
                                            <img src="{{ asset('storage/media/stock_cars_imgs/' . $image->path . '/' . $image->name) }}"
                                                class="card-img-top" alt="No_IMG">
                                        @break
                                    @endif
                                @endforeach
                            </div>

                            {{-- <a href="{{ route('stock-car.update', ['brandSlug' => $brandSlug, 'modelSlug' => $model->slug, 'stockYear' => $stockCar->year]) }}"> --}}
                            {{-- <a href="{{ route('stock-car.edit', [ 'brandSlug' => $brandSlug, 'modelSlug' => $model->slug, 'stockYear' => $stockCar->year, 'id' =>$stockCar->id ]) }}"> --}}
                            {{-- <a href="{{ route('stock-car.edit', ['brandSlug' => $brandSlug, 'modelSlug' => $model->slug, 'stockYear' => $stockCar->year, 'id' => $stockCar->id]) }}"> --}}
                            <a
                                href="{{ route('stock-car.edit', ['slug' => $brandData->slug, 'modelSlug' => $model->slug, 'stockYear' => $stockCar->year, 'id' => $stockCar->id]) }}">

                                <button class="btn btn-light btn-icon stockCarImageEdit">
                                    <i data-feather="edit"></i>
                                </button>
                            </a>

                            <button class="btn btn-light btn-icon stockCarImageDel" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $stockCar->id }}" title="Edit">
                                <i data-feather="trash"></i>
                            </button>
                            <x-modal.confirm-delete-modal route="{{ route('stock-car.delete', $stockCar->id) }}"
                                id="{{ $stockCar->id }}" />


                        </div>
                        {{-- add categories --}}
                        <div class="card-body">
                            <h4 class="mb-4 ">
                                {{-- <span>{{ $brandData->name }}</span> --}}
                                <span>{{ $model->name }}</span>
                                <span>{{ $stockCar->year }}</span>

                            </h4>
                            <a href="{{ route('model-category.create', $stockCar->id) }}"
                                class="btn btn-outline-primary">add</a>
                            <a href="#" class="btn btn-primary">Import .xlsx</a>
                            <a href="#" class="btn btn-secondary">Export .xlsx</a>
                        </div>
                        {{-- categories --}}
                        <div>
                            @foreach ($stockCar->stockCarCategories->sortBy(function ($category) {
        // Extract the numerical part of the price and cast it to a float for sorting
        return (float) preg_replace('/[^0-9.]/', '', $category->price);
    }) as $category)
                                <div class="d-flex align-items-center ml-2 mr-2">
                                    <div class="mr-auto p-2">
                                        <a href="{{ route('model-category.edit', $category->id) }}"
                                            class="text-primary">
                                            <label>{{ $category->name }}</label>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <label>
                                            <span>EGP
                                            </span>{{ number_format((float) preg_replace('/[^0-9.]/', '', $category->price), 2) }}
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection

@section('script')
@if (Session::has('success'))
    {{-- Popup-seccuss --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}',
                showConfirmButton: true, // Set to true to show confirm button
                confirmButtonText: 'Done', // Customize the button text
                // timer: 1500
            });
        });
    </script>

    {{-- toast-seccuss --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
            });
        });
    </script> --}}
@endif
@endsection
