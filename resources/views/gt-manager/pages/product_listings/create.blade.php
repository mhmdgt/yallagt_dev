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
                                    <label>Seller</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="seller_id">
                                            <option value="Select Model">Select seller</option>
                                            @foreach ($sellers as $seller)
                                                <option value="{{ $seller->id }}">{{ $seller->name }}
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
                                    <input type="text" class="form-control" name="sku" placeholder="I31HKWO637">
                                    <x-errors.display-validation-error property="sku" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price"
                                    value="{{ old('selling_price') }}" oninput="formatNumber(this)" placeholder="00,000">
                                    <x-errors.display-validation-error property="selling_price" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-success float-right" type="submit">Submit form</button>
        </Form>
    </div>
@endsection

