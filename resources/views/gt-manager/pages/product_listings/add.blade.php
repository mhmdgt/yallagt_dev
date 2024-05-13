@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Availability</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Product</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="{{ route('product-listings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact Details</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Storehouse</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="storehouse">
                                            <option value="Select Model">Select Storehouse</option>
                                            @foreach ($storehouses as $storehouse)
                                                <option value="{{ $storehouse->id }}">{{ $storehouse->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="storehouse" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="sku" value="">
                                    <x-errors.display-validation-error property="sku" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>QTY</label>
                                    <input type="number" class="form-control" name="qty" value="">
                                    <x-errors.display-validation-error property="qty" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price" oninput="formatNumber(this)">
                                    <x-errors.display-validation-error property="selling_price" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">Submit form</button>
        </Form>
    </div>
@endsection

