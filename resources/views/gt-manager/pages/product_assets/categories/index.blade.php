@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Product Categories</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Category
                </button>
            </div>
        </nav>
        {{-- ========================== All Categories ========================== --}}
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            <h6 class="card-title">All Categories</h6>
                            <div class="row">
                                {{-- LOOP --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                    <a href="{{ route('pro-categories.show') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo ">
                                                <img width="100px"
                                                    src="{{ !empty('') ? url('gt_manager/media/product_categories/') : asset('gt_manager/media/no_image.jpg') }}"
                                                    alt="No_IMG">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Oils & Liquids</p>
                                    </a>
                                </div>
                                {{-- LOOP --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
