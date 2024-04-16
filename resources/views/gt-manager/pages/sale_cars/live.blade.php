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
                <a href="{{ route('sale-car.create') }}" class="btn btn-primary">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Create Model
                </a>
            </div>
        </nav>
        {{-- ========================== Brand Table ==========================  --}}
        {{-- Loop Starts --}}
        <div class="col-md-4 mb-4">
            <div class="card">
                {{-- image --}}
                <div>
                    <img src="{{ asset('gt_manager/media/stock_cars/audi-s3.jpg') }}" class="card-img-top" alt="Cat_img">
                    <button class="btn btn-light stockCarImageEdit" data-toggle="modal" data-target="#EditStockModel">
                        <i data-feather="edit"></i>
                    </button>
                </div>
                {{-- Detalis --}}
                <div class="card-body">
                    <h4 class="card-text">
                        <span>New</span>
                        Mercedes
                        C180
                        2023
                    </h4>

                    <h4 class="card-text text-primary">
                        <span class="h5 text-dark">EGP: </span>23,000,000
                    </h4>

                    <div class="card-text mt-4">
                        <span class="badge bg-light p-2 h6">
                            <i class="bi bi-speedometer2"></i>
                            300,000 Km
                        </span>
                        <span class="badge bg-light p-2 h6">
                            <i class="bi bi-gear-wide-connected"></i>
                            Automatic
                        </span>
                    </div>

                    <div class="card-text mt-4">
                        <i class="bi bi-geo-alt"></i>
                        <span class="badge_icon mr-2 h6">Cairo</span>
                        <i class="bi bi-calendar-check"></i>
                        <span class="badge_icon_second mr-2 h6">5 moths ago</span>
                    </div>
                </div>
                {{-- Contorllers --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-success btn-block">
                                <i class="bi bi-telephone"></i>
                                <span class="ml-2">Call</span>
                            </button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary btn-block">
                                <i class="bi bi-x-octagon"></i>
                                <span class="ml-2">Decline</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Loop End --}}
    </div>
@endsection
