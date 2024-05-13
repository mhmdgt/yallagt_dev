@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-skus.index', $product->slug)}}">{{ $product->name }}</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Product Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            @foreach ($product->skus as $sku)
                                @foreach ($sku->images as $image)
                                    @if ($image->main_img)
                                        <img src="{{ asset('storage/media/product_sku_imgs/' . $image->path . '/' . $image->name) }}"
                                            class="image-in-circle-75" alt="Main Image">
                                    @endif
                                @endforeach
                            @endforeach
                            <span class="profile-name ml-3 h4">{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== Product SKUS ====== --}}
        <Form action="{{ route('product-skus.store', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sukGenerator" name="sku" required
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="sku_name_en">
                                    <x-errors.display-validation-error property="sku_name_en" />
                                </div>
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="sku_name_ar" dir="auto">
                                    <x-errors.display-validation-error property="sku_name_ar" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Part Number / OEM</label>
                                    <input type="text" class="form-control" autocomplete="off" name="part_number">
                                    <x-errors.display-validation-error property="part_number" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Main price</label>
                                    <input type="text" class="form-control" name="main_price" oninput="formatNumber(this)">
                                    <x-errors.display-validation-error property="main_price" />
                                </div>
                            </div>
                            <div class="form-group pt-0">
                                <label>SKU Images</label>
                                <input type="file" class="filepond" name="image" multiple credits="false">
                                <x-errors.display-validation-error property="image" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">Submit form</button>
        </Form>
    </div>ÍÍ
@endsection

@section('script')
    <script>
        // ---------------------------------------- Filepond
        // Plugins
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // FilePond.registerPlugin(FilePondPluginImageTransform);
        // FilePond.registerPlugin(FilePondPluginFileMetadata);
        // Vars
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        // Option
        pond.setOptions({
            allowMultiple: true,
            allowReorder: true,
            server: {
                process: '/manage/tmpFilepondUpload',
                revert: '/manage/tmpFilepondDelete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            // Plugin Services
            // imageTransformOutputStripImageHead: true,
            // imageTransformCanvasMemoryLimit: 50000000,
            // imageTransformOutputQuality: 100,
        });
    </script>
@endsection
