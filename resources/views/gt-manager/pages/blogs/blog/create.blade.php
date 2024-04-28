@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Blog</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Add Product ========================== --}}
        <Form action="" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Title & Content --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">New Blog</h6>
                            {{-- Title --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Title <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en" value="">
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Title <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_en" value="">
                                </div>
                            </div>
                            {{-- Description --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="description_en" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="description_ar" id="tinymceExample2" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Media --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group pt-0 mt-4">
                                <label>Model Images</label>
                                <input type="file" class="filepond" name="image" multiple credits="false">
                                <x-errors.display-validation-error property="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Categories & Tags --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- Categories --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Category</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="manufacturer_id">
                                            <option value="Select Model">Select Manufacturer</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- releated to --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Releated To</label>
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Kia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="KN">Cerato</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">2012 2018</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="KN">Automatic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Turbo-Charger</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="KN">Banzen</option>
                                            <option value="HW">Picanto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- Tags --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label> <i class="bi bi-tags"></i> Tags input </label>
                                    <div>
                                        <input name="tags" id="tags" value="" />
                                    </div>
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
                                    {{-- <h6 class="mt-3 mb-2 font-weight-bold">Payment</h6> --}}
                                    <h6 class="card-title">Status</h6>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios5" value="active">
                                            {{-- {{ $stockCar->status == 'active' ? 'checked' : '' }}> --}}
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden">
                                            {{-- {{ $stockCar->status == 'hidden' ? 'checked' : '' }}> --}}
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
            <button class="btn btn-primary float-right" type="submit">Submit form</button>
        </Form>
    </div>
@endsection
