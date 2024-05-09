@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Products</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Product</li>
                </ol>
                <div class="d-flex justify-content-between">
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
        <Form action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- General Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> General</label>
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
                                        <x-errors.display-validation-error property="manufacturer_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Category</label>
                                    <div>
                                        <select id="categorySelect" class="js-example-basic-single w-100"
                                            name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category && $product->category->id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="category_id" />
                                    </div>
                                </div>

                                <div class="col">
                                    <label>Sub Category</label>
                                    <div>
                                        <select id="subcategorySelect" class="js-example-basic-single w-100"
                                            name="subcategory_id">
                                            <option>Select Category First</option>
                                            @foreach ($subCategories as $subcategory)
                                                <option value="{{ $subCategory->id }}"
                                                    {{ $subCategory->id == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-errors.display-validation-error property="subcategory_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ $product->getTranslations('name')['en'] }}">
                                        <x-errors.display-validation-error property="name_en" />
                                </div>
                                <div class="col">
                                    <label>Product Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar"
                                        value="{{ $product->getTranslations('name')['ar'] }}">
                                        <x-errors.display-validation-error property="name_ar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SKU / Part number / Price  --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Details</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>SKU</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sukGenerator" name="sku" required
                                            value="{{ $product->skus->first()->sku }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Part Number / OEM</label>
                                    <input type="text" class="form-control" autocomplete="off" name="part_number"
                                        value="{{ $product->skus->first()->part_number }}">
                                    <x-errors.display-validation-error property="part_number" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label for="exampleInputNumber1">Main price</label>
                                    <input type="main_price" class="form-control" name="main_price"
                                        value="{{ $product->skus->first()->main_price }}">
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
                                @foreach ($product->images as $index => $image)
                                    <div class="img-container position-relative" id="image-container-{{ $index }}">
                                        <img src="{{ display_img('media/product_imgs/' . $image->name) }}" alt="">
                                        <button class="delete-btn" data-index="{{ $index }}">&times;</button>
                                        <input type="hidden" name="images[{{ $index }}][name]" value="{{ $image->name }}">
                                        <input type="radio" class="select-btn" name="main_img" value="{{ $image->id }}"
                                               {{ $image->main_img ? 'checked' : '' }}>
                                    </div>
                                @endforeach
                            </div>
                            <x-errors.display-validation-error property="main_img" />
                            <div class="form-group pt-0 mt-4">
                                <label>Add More Images</label>
                                <input type="file" class="filepond" name="image" multiple>
                                <x-errors.display-validation-error property="image" />
                            </div>
                            {{-- Brochure --}}
                            <div class="form-group pt-0">
                                <label>PDF Brochure</label>
                                <input type="file" name="brochure" accept="application/pdf" class="file-upload-default">
                                <x-errors.display-validation-error property="brochure" />
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
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px"
                                                            data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#"><i data-feather="download"
                                                                class="icon-sm mr-2"></i> <span
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
                        </div>
                    </div>
                </div>
            </div>
            {{-- DES --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label class="card-title mt-2"><i class="bi bi-plus-circle"></i> Description</label>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="description_en" id="tinymceExample" rows="10">
                                        {{ $product->getTranslations('description')['en'] }}
                                    </textarea>
                                    <x-errors.display-validation-error property="description_en" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Description<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="description_ar" id="tinymceExample2" rows="10">
                                        {{ $product->getTranslations('description')['ar'] }}
                                    </textarea>
                                    <x-errors.display-validation-error property="description_ar" />
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
                                                {{ $product->status == 'active' ? 'checked' : '' }}>
                                            Active
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="optionsRadios6" value="hidden"
                                                {{ $product->status == 'hidden' ? 'checked' : '' }}>
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
        // ---------------------------------------- SubCategories
        $(document).ready(function() {
            // Select the correct option based on the value of the "category" input
            var selectedCategoryId = $('#categorySelect').val();
            $('#categorySelect option[value="' + selectedCategoryId + '"]').prop('selected', true);

            // Select the correct option based on the value of the "subcategory" input
            var selectedSubcategoryId = '{{ $subCategory->id }}'; // Get the product's subcategory ID
            $('#subcategorySelect option[value="' + selectedSubcategoryId + '"]').prop('selected',
            true); // Set the selected option for subcategory

            // Handle change event on the category select
            $('#categorySelect').change(function() {
                var categoryId = $(this).val();
                if (!categoryId) {
                    $('#subcategorySelect').html('<option value="">Select Category First</option>');
                    return;
                }

                // Perform AJAX request to fetch subcategories
                $.ajax({
                    url: '/product-subcategories/categories/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Select Subcategory</option>';
                        $.each(data, function(index, subcategory) {
                            // Get the translation based on the current locale
                            var subcategoryName = subcategory.name[
                                "{{ App::getLocale() }}"];

                            // Append the option to the select dropdown
                            options += '<option value="' + subcategory.id + '">' +
                                subcategoryName + '</option>';
                        });
                        $('#subcategorySelect').html(options);

                        // Set the selected option based on the product's subcategory ID
                        $('#subcategorySelect').val(selectedSubcategoryId);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching subcategories:', error);
                    }
                });
            });

            // Trigger change event on category select to load subcategories initially
            $('#categorySelect').trigger('change');
        });
        // ---------------------------------------- Brands&Models
        $(document).ready(function() {
            // Select the correct option based on the value of the "brand" input
            var selectedBrandId = $('#brandSelect').val();
            $('#brandSelect option[value="' + selectedBrandId + '"]').prop('selected', true);

            // Select the correct option based on the value of the "model" input
            var selectedModelId = $('#modelSelect').val();
            $('#modelSelect option[value="' + selectedModelId + '"]').prop('selected', true);

            // Handle change event on the brand select
            $('#brandSelect').change(function() {
                var brandId = $(this).val();
                if (!brandId) {
                    $('#modelSelect').html('<option value="">Select Brand First</option>');
                    return;
                }

                // Perform AJAX request to fetch models
                $.ajax({
                    url: '/manage/car-brand-models/models/' + brandId,
                    type: 'GET',
                    success: function(data) {
                        var options = '<option value="">Select Model</option>';
                        $.each(data, function(index, model) {
                            // Get the translation based on the current locale
                            var modelName = model.name["{{ App::getLocale() }}"];

                            // Append the option to the select dropdown
                            options += '<option value="' + model.id + '">' + modelName +
                                '</option>';
                        });
                        $('#modelSelect').html(options);

                        // Select the correct option based on the value of the "model" input
                        var selectedModelId = $('#modelSelect').val();
                        $('#modelSelect option[value="' + selectedModelId + '"]').prop(
                            'selected', true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching models:', error);
                    }
                });
            });

            // Trigger change event on brand select to load models initially
            $('#brandSelect').trigger('change');
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
