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
                                            <img src="{{ display_img($image->name) }}" class="card-img-top" alt="No_IMG">
                                        @endif
                                    @endforeach
                                </div>

                                <a href="{{ route('stock-car.edit', $stockCar->slug) }}">
                                    <button class="btn btn-light btn-icon stockCarImageEdit">
                                        <i data-feather="edit"></i>
                                    </button>
                                </a>

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
                                {{-- Extract the numerical part of the price and cast it to a float for sorting --}}
                                @foreach (sortStockCarCategoriesByPrice($stockCar->stockCarCategories) as $category)
                                    <div class="d-flex align-items-center ml-2 mr-2">
                                        <div class="mr-auto p-2">
                                            <a href="{{ route('model-category.edit', ['carSlug' => $stockCar->slug , 'slug' => $category->slug] ) }}"
                                                class="text-primary">
                                                <label>{{ $category->name }}</label>
                                            </a>
                                        </div>
                                        <div class="p-2">
                                            <label>
                                                <span>EGP
                                                </span>{{ number_format($category->price, 0, ',', ',') }}
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
<<<<<<< HEAD

                            <a
                                href="{{ route('stock-car.edit', ['slug' => $brandData->slug, 'modelSlug' => $model->slug, 'stockYear' => $stockCar->year, 'id' => $stockCar->id]) }}">

                                <button class="btn btn-light btn-icon stockCarImageEdit">
                                    <i data-feather="edit"></i>
                                </button>
                            </a>
<<<<<<< HEAD
{{-- 
                            <form method="POST" id="deleteForm" action="{{ route('stock-car.delete', $stockCar->id) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-icon stockCarImageDel">
                                    <i data-feather="trash"></i>
                                </button>
=======

                            <button class="btn btn-light btn-icon stockCarImageDel" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $stockCar->id }}" title="Edit">
                                <i data-feather="trash"></i>
                            </button>
                            <x-modal.confirm-delete-modal route="{{ route('stock-car.delete', $stockCar->id) }}"
                                id="{{ $stockCar->id }}" />
>>>>>>> 42ce7fe162a0f4e2a565c5439ff0bf38cb896098

                            </form> --}}
                            <button class="btn btn-light btn-icon stockCarImageDel" data-toggle="modal"
                            data-target="#confirmDeleteModal{{ $stockCar->id }}" title="Edit">
                            <i data-feather="trash"></i>
                        </button>
                        <x-modal.confirm-delete-modal route="{{route('stock-car.delete', $stockCar->id) }}" id="{{ $stockCar->id}}" />
                    

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
                            {{-- Extract the numerical part of the price and cast it to a float for sorting --}}
                            @foreach ($stockCar->stockCarCategories->sortBy(function ($category) {
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
                                            </span>{{ number_format($category->price, 0, ',', ',') }}
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
=======
>>>>>>> 0b87006dac0387138e958fa42d1f6286df23e1a8
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
