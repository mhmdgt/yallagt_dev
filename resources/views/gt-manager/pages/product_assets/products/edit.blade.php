@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Product</li>
                </ol>
                <div class="d-flex justify-content-between">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-backspace mr-2"></i>Back</a>
                    <button type="button" class="btn btn-danger btn-icon-text mb-2 mb-md-0 ml-2" data-toggle="modal"
                        data-target="#confirmDeleteModal{{ $product->id }}" title="Edit">
                        <i class="bi bi-trash3"></i>
                        Delete
                    </button>
                    <x-modal.confirm-delete-modal route="{{ route('products.destroy', $product->slug) }}"
                        id="{{ $product->id }}" />
                </div>
            </div>
        </nav>
        {{-- ========================== All Categories ========================== --}}
        <Form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- General Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">General Details</h6>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Manufacturer</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="manufacturer_id">
                                            <option value="Select Model">Select Manufacturer</option>
                                            @foreach ($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}"
                                                    {{ $manufacturer->id == $product->manufacturer_id ? 'selected' : '' }}>
                                                    {{ $manufacturer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ $product->getTranslations('name')['en'] }}">
                                </div>
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar"
                                        value="{{ $product->getTranslations('name')['ar'] }}">

                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="description_en" id="tinymceExample" rows="10">
                                        {{ $product->getTranslations('description')['en'] }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="description_ar" id="tinymceExample2" rows="10">
                                        {{ $product->getTranslations('description')['ar'] }}
                                    </textarea>
                                </div>
                            </div>
                            {{-- Media --}}
                            <div class="form-group pt-0 mt-4">
                                <label>PDF Brochure</label>
                                <input type="file" name="brochure" accept="application/pdf" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Borchur">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-light" type="button">Upload</button>
                                    </span>
                                </div>
                                <x-errors.display-validation-error property="brochure" />
                                @if (!empty($product->brochure))
                                    <div class="card mt-3">
                                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                                            <div class="d-flex align-items-center">
                                                <img class="image-in-box mr-2"
                                                    src="{{ asset('gt_manager/media/pdf.png') }}" alt="Wrong_Data">
                                                <div class="ui-attachment jobs-resume-card__attachment ui-attachment--pdf">
                                                    <h6 style="word-wrap: break-word; max-width: 150px;">
                                                        {{ $product->brochure }}</h6>
                                                    <p>Uploaded on {{ $product->updated_at->format('d-m-Y') }}</p>
                                                </div>
                                                <!-- Dropdown button positioned at top-left corner -->
                                                <div class="dropdown position-absolute" style="top: 8px; right: 8px;">
                                                    <button class="btn p-1" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px"
                                                            data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                                data-feather="download" class="icon-sm mr-2"></i> <span
                                                                class="">download</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#"><i data-feather="trash"
                                                                class="icon-sm mr-2"></i></i> <span
                                                                class="">Delete</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">
                <i class="bi bi-bookmark-check"></i>
                    Update
            </button>
        </Form>
    </div>
@endsection
