@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Spec Categories</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Specifications ========================== --}}
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            <h5>Specifications</h5>
                            <div class="row">
                                {{-- Body Shapes --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.shapes') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="80px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/bodyShape.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Body Shapes</p>
                                    </a>
                                </div>
                                {{-- Colors --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.colors') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="90px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/colors.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Colors</p>
                                    </a>
                                </div>
                                {{-- Fuel Type --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.fuel') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="100px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/FuelType.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Fuel Type</p>
                                    </a>
                                </div>
                                {{-- Transmassion Type --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.transmassion') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="80px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/Transmassion.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Transmassion Type</p>
                                    </a>
                                </div>
                                {{-- Engine Aspiration --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.aspiration') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="80px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/EngineAspiration.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Engine Aspiration</p>
                                    </a>
                                </div>
                                {{-- Engine Capacity --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.cc') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="100px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/EngineCC.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Engine Capacity</p>
                                    </a>
                                </div>
                                {{-- Engine KM --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.km') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="100px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/EngineKM.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Engine KM</p>
                                    </a>
                                </div>
                                {{-- Features --}}
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4 mt-4">
                                    <a href="{{ route('spec-categories.features') }}">
                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo">
                                                <img width="100px"
                                                    src="{{ asset('gt_manager/media/spec_category_icons/features.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">Features</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
