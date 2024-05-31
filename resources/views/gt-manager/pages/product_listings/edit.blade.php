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
        <Form action="{{ route('product-listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Contact Details</h6>
                            {{-- Title --}}
                            <input type="hidden" name="seller_id" value="{{ $listing->seller->id }}">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Seller</label>
                                    <input type="text" class="form-control" readonly
                                        value="{{ ucwords($listing->seller->name) }}">

                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="sku" readonly
                                        value="{{ $listing->sku }}">
                                    <x-errors.display-validation-error property="sku" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price"
                                        value="{{ number_format($listing->selling_price, 0, '.', ',') }}"
                                        oninput="formatNumber(this)">
                                    <x-errors.display-validation-error property="selling_price" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Status --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <h6 class="card-title">Status</h6>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios5" value="active"
                                                {{ $listing->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $listing->status == 'hidden' ? 'checked' : '' }}>
                                            Hidden
                                            <i class="input-frame"></i></label>
                                    </div>
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
