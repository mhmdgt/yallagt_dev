@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('all-stock-cars') }}">All Stock Models</a></li>
                    <li class="breadcrumb-item">All Stock</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#AddStockModel">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add Stock Model
                </button>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <div class="row gy-3">
            {{-- Loop Starts --}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    {{-- image --}}
                    <div>
                        <img src="{{ asset('gt_manager/media/stock_cars/audi-s3.jpg') }}" class="card-img-top"
                            alt="Cat_img">
                        <button class="btn btn-light stockCarImageEdit" data-toggle="modal" data-target="#EditStockModel">
                            <i data-feather="edit"></i>
                        </button>
                        <button class="btn btn-light stockCarImageDel " data-toggle="modal" data-target="#EditStockModel">
                            <i data-feather="trash"></i>
                        </button>
                    </div>
                    {{-- add categories --}}
                    <div class="card-body">

                        <h4 class="mb-4 ">Audi A3 2024</h4>

                        <a href="{{ route('create-category') }}" class="btn btn-outline-primary">add</a>
                        <a href="#" class="btn btn-primary">Import .xlsx</a>
                        <a href="#" class="btn btn-secondary">Export .xlsx</a>
                    </div>
                    {{-- categories --}}
                    <div class="stock_car_price_section">
                        <div class="d-flex align-items-center priceBox ml-2 mr-2">
                            <div class="mr-auto p-2">
                                <label class="visually-hidden" for="inline-form-name">2.0 A/T Sprint</label>
                            </div>
                            <div class="p-2">
                                <label class="visually-hidden" for="inline-form-website">
                                    <span>EGP </span>25,000,000</p>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center priceBox ml-2 mr-2">
                            <div class="mr-auto p-2">
                                <label class="visually-hidden" for="inline-form-name">2.0 A/T Sprint</label>
                            </div>
                            <div class="p-2">
                                <label class="visually-hidden" for="inline-form-website">
                                    <span>EGP </span>25,000,000</p>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center priceBox ml-2 mr-2">
                            <div class="mr-auto p-2">
                                <label class="visually-hidden" for="inline-form-name">2.0 A/T Sprint</label>
                            </div>
                            <div class="p-2">
                                <label class="visually-hidden" for="inline-form-website">
                                    <span>EGP </span>25,000,000</p>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- Loop End --}}
        </div>
        {{-- ====== Add Stock Model ====== --}}
        <div class="modal fade" id="AddStockModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Stock Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formValidation" class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('car-brand.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Model</label>
                                <div>
                                    <select class="js-example-basic-single w-100">
                                        <option value="TX">Cerato</option>
                                        <option value="NY">Picanto</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Year</label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
                            </div>

                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group">
                                <div>
                                    <label>Add brochure</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                {{-- <div>
                                    <label>Model Main Photo</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmaill" class="form-label"> </label>
                                        <img id="showImage" class="image-rec-full"
                                            src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                                    </div>
                                </div>
                                <div>
                                    <label>Other Photos</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image" multiple>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmaill" class="form-label"> </label>
                                        <img id="showImage" class="image-rec-full"
                                            src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                                    </div>
                                </div> --}}

                                {{-- Media --}}
                                <div class="row">
                                    <div class="col-md-12 grid-margin stretch-card">

                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Media</h6>
                                                <div>
                                                    <label>Upload your images</label>
                                                    <form action="#" enctype="multipart/form-data" class="dropzone"
                                                        id="image-upload">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- ====== Edit Stock Model ====== --}}
        <div class="modal fade" id="EditStockModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formValidation" class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('car-brand.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    placeholder="English Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Year</label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
                            </div>

                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group">
                                <div>
                                    <label>Add brochure</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmaill" class="form-label"> </label>
                                        <img id="showImage" class="image-rec-full"
                                            src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                                    </div>
                                </div>
                                <div>
                                    <label>Model Main Photo</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmaill" class="form-label"> </label>
                                        <img id="showImage" class="image-rec-full"
                                            src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                                    </div>
                                </div>
                                <div>
                                    <label>Other Photos</label>
                                    <input type="file" name="logo" class="file-upload-default" id="image">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image" multiple>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmaill" class="form-label"> </label>
                                        <img id="showImage" class="image-rec-full"
                                            src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
                                    </div>
                                </div>
                            </div>



                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
