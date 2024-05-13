@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('product-skus.index', $product->slug) }}">{{ $product->name }}</a></li>
                </ol>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-danger btn-icon-text mb-2 mb-md-0 ml-2" data-toggle="modal"
                        data-target="#confirmDeleteModal{{ $product->id }}" title="Edit">
                        <i class="bi bi-trash3"></i>
                        Delete
                    </button>
                    <x-modal.confirm-delete-modal route="{{ route('product-skus.destroy', $skuData->sku) }}"
                        id="{{ $skuData->id }}" />
                </div>
            </div>
        </nav>
        {{-- ====== Product Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <h5>Product:</h5>
                            <span class="profile-name ml-3 h4">{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== SKU ====== --}}
        <Form action="{{ route('product-skus.update', $skuData->sku) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sukGenerator" name="sku" required
                                            value="{{ $skuData->sku }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="sku_name_en"
                                        value="{{ $skuData->getTranslations('sku_name')['en'] }}">
                                    <x-errors.display-validation-error property="sku_name_en" />
                                </div>
                                <div class="col">
                                    <label>Sku Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="sku_name_ar" dir="auto"
                                        value="{{ $skuData->getTranslations('sku_name')['ar'] }}">
                                    <x-errors.display-validation-error property="sku_name_ar" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Part Number / OEM</label>
                                    <input type="text" class="form-control" autocomplete="off" name="part_number"
                                        value="{{ $skuData->part_number }}">
                                    <x-errors.display-validation-error property="part_number" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Main price</label>
                                    <input type="text" class="form-control" name="main_price" oninput="formatNumber(this)"
                                    value="{{ $skuData->main_price }}">
                                    <x-errors.display-validation-error property="main_price" />
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
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Media</label>
                            {{-- images --}}
                            <div class="rounded mt-3 p-2 owl-carousel" id="image-carousel">
                                @php

                                    $images = $skuData->images->sortByDesc('main_img')->values();
                                @endphp
                                @foreach ($images as $index => $image)
                                    <div class="img-container position-relative" id="image-container-{{ $index }}">
                                        <img src="{{ asset('storage/media/product_sku_imgs/' . $image->name) }}"
                                            alt="">
                                        <button class="delete-btn" data-index="{{ $index }}">&times;</button>
                                        <input type="hidden" name="images[{{ $index }}][name]"
                                            value="{{ $image->name }}">
                                        <input type="radio" class="select-btn" name="main_img"
                                            value="{{ $image->id }}" {{ $image->main_img ? 'checked' : '' }}>
                                    </div>
                                @endforeach
                            </div>
                            <x-errors.display-validation-error property="main_img" />
                            <div class="form-group pt-0 mt-4">
                                <label>Add More Images</label>
                                <input type="file" class="filepond" name="image" multiple>
                                <x-errors.display-validation-error property="image" />
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
                                                {{ $skuData->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $skuData->status == 'hidden' ? 'checked' : '' }}>
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
            <button class="btn btn-primary float-right" type="submit">
                <i class="bi bi-bookmark-check"></i>
                Update
            </button>
        </Form>
    </div>
@endsection

@section('script')
    <script>
        // ---------------------------------------- Filepond
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
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

        });
        // ---------------------------------------- Carousel & buttons
        $(document).ready(function() {
            var owl = $('#image-carousel').owlCarousel({
                loop: false,
                margin: 10,
                slideBy: 2,
                nav: false,
                navText: ["<i class='bi bi-arrow-left-circle-fill'></i>",
                    "<i class='bi bi-arrow-right-circle-fill'></i>"
                ],
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                        slideBy: 2
                    },
                    600: {
                        items: 3,
                        slideBy: 3
                    },
                    1000: {
                        items: 6,
                        slideBy: 5
                    }
                }
            });
            // ---------------------------------------- Delete Button
            $('.delete-btn').click(function(event) {
                event.preventDefault();

                var index = $(this).data('index');

                // Remove the corresponding input fields
                $('input[name="images[' + index + '][name]"]').remove();
                $('input[name="images[' + index + '][url]"]').remove();

                // Remove the item from the Owl Carousel's internal data structure
                owl.trigger('remove.owl.carousel', [index]).trigger('refresh.owl.carousel');

                // After removing the item, update the index values for remaining items
                // Update the index data attribute for delete buttons
                $('.delete-btn').each(function(i) {
                    $(this).data('index', i);
                });

                // Update the name attribute for input fields
                $('input[name^="images"]').each(function(i) {
                    var newName = $(this).attr('name').replace(/\[\d+\]/, '[' + i + ']');
                    $(this).attr('name', newName);
                });
            });
        });
    </script>
@endsection
