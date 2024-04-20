@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('stock-car.index') }}">Brands</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('stock-car.show', $brandSlug) }}">{{ $brandData->name }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ $modelData->name }}</a></li>
                </ol>
            </div>
        </nav>
        {{-- Form --}}
        <form method="POST" action="{{ route('stock-car.update',  $stockCar->id) }}" enctype="multipart/form-data" id="my-form">
            @csrf
            @method('PUT')
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
                                            @foreach ($brandModels as $brandModel)
                                                <option value="{{ $brandModel->id }}" @selected($brandModel->id == $stockCar->car_brand_model_id))>
                                                    {{ $brandModel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-errors.display-validation-error property="car_brand_model_id" />
                                </div>
                                <div class="col">
                                    <label for="year">Year</label>
                                    <div>
                                        <select class="js-example-basic-single w-100" name="year">
                                            @php
                                                $currentYear = date('Y');
                                                $endYear = $currentYear - 65;
                                            @endphp
                                            @for ($year = $currentYear + 1; $year >= $endYear; $year--)
                                                <option value="{{ $year }}"
                                                    @selected( $year == $stockCar->year) >
                                                    {{ $year }}
                                                </option>
                                            @endfor
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

                                <input type="file" name="image"
                                    file="asset('storage/media/stock_cars_imgs/' . $images->name)" multiple>
                            </div>

                            <div class="form-group pt-0 mt-4">
                                <label>PDF Brochure</label>
                                <input type="file" name="img[]" accept="application/pdf" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info"
                                        placeholder="Upload Borchur">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-light" type="button">Upload</button>
                                    </span>
                                </div>
                                @if (!empty($stockCar->brochure))
                                    <div class="card mt-3">
                                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                                            <div class="d-flex align-items-center">
                                                <img class="image-in-box mr-2"
                                                    src="{{ asset('gt_manager/media/pdf.png') }}" alt="Wrong_Data">
                                                <div class="ui-attachment jobs-resume-card__attachment ui-attachment--pdf">
                                                    <h6 style="word-wrap: break-word; max-width: 150px;">
                                                        {{ $stockCar->brochure }}</h6>
                                                    <p>Uploaded on {{ $stockCar->updated_at->format('d-m-Y') }}</p>
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
                                                        <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                                data-feather="trash" class="icon-sm mr-2"></i></i> <span
                                                                class="">Delete</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                                id="optionsRadios5" value="active"
                                                {{ $stockCar->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $stockCar->status == 'hidden' ? 'checked' : '' }}>
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
            <div class="form-group float-right">
                <button class="btn btn-primary mr-2" type="submit">
                    <i class="bi bi-bookmark-check"></i>
                    Save
                </button>
                <button class="btn btn-light">
                    <i class="bi bi-x-circle"></i>
                    Cancel
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const existingImages = {!! json_encode($images) !!};
        const existingBrand = {!! json_encode($brandData->slug) !!};


        console.log(existingBrand);
        console.log('existingBrand');

        var images = [];
        let mainpath = "{{ asset('storage/media/stock_cars_imgs/') }}";
        var filesOptions = [];

        @foreach ($images as $imageName)
            var imageUrl = "{{ asset('storage/media/stock_cars_imgs/' . $imageName->name) }}";
            var file = {
                source: imageUrl,
                //     options: {
                //         type: 'public' // Assuming these are local files
                //     },
                brandData: existingBrand,
                //     fileMetadataObject: {
                //     brandData: existingBrand,
                // },
            };
            filesOptions.push(file);
        @endforeach

        const pond = FilePond.create(inputElement, {
            files: filesOptions.map(url => ({
                source: url.source,
                // options: url.options,
                fileMetadataObject: url.brandData
            })),


        });
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
            onaddfile: (error, file) => {
                if (!error) {
                    // Include metadata with the file
                    const metadata = {
                        brandData: existingBrand,
                        // description: 'Image Description'
                        // Add any other metadata fields as needed
                    };
                    file.setMetadata(metadata);
                } else {
                    console.error(error);
                }
            },

            imageTransformOutputStripImageHead: true,
            imageTransformCanvasMemoryLimit: 50000000,
            imageTransformOutputQuality: 80,
        });
    </script>
@endsection
