@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('stock-car.index') }}">Brands</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('stock-car.show', $brandData->slug) }}">{{ $brandData->name }}</a></li>
                    <li class="breadcrumb-item"><a>Create Model</a></li>
                </ol>
            </div>
        </nav>
        {{-- Form --}}
        <form method="POST" action="{{ route('stock-car.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="model">Model</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="car_brand_model_id">
                                            <option value="Select Model">Select Model</option>
                                            @foreach ($brandModels as $brandModel)
                                                <option value="{{ $brandModel->id }}">{{ $brandModel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="car_brand_model_id" />
                                </div>

                                <div class="col">
                                    <label for="year">Year</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="year">
                                            <option value="Select Model">Select Year</option>
                                            @foreach (getYearsRange() as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="year" />

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
                            <h4>Media</h4>
                            <div class="form-group pt-0 mt-4">
                                <label>Model Images</label>
                                <input type="file" class="filepond" name="image" multiple credits="false">
                                <x-errors.display-validation-error property="image" />
                            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tags --}}
            {{-- <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="bi bi-tags"></i>
                                Tags input
                            </h6>
                            <p class="mb-2">Type something to add a new tag</p>
                            <div>
                                <input name="tags" id="tags" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- Submit --}}
            <button class="btn btn-success float-right" type="submit">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        // FilePond Settings For Stock Car Images
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageTransform);
        FilePond.registerPlugin(FilePondPluginFileMetadata);

        const existingBrand = {!! json_encode($brandData->slug) !!};

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        // Set the options for you files
        pond.setOptions({
            allowMultiple: true,
            allowReorder: true,
            server: {
                process: '/manage/stock-car/tmp-upload',
                revert: '/manage/stock-car/tmp-delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },

            fileMetadataObject: {
                brandData: existingBrand,
            },

            imageTransformOutputStripImageHead: true,
            imageTransformCanvasMemoryLimit: 50000000,
            imageTransformOutputQuality: 80,
        });
    </script>
@endsection
