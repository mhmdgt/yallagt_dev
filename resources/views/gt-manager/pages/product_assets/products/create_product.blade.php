@extends('gt-manager.layout.app')
@section('content')
<div class="page-content">
    {{-- ========================== NAV Section ========================== --}}
    <nav class="page-breadcrumb">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Create Product</li>
            </ol>
            <a href="{{ URL::previous() }}" class="btn btn-primary">
                <i class="bi bi-backspace mr-2"></i>
                Back
            </a>
        </div>
    </nav>
    {{-- ========================== add product ========================== --}}
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
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <div class="col">
                                <label>Product Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" value="">
                            </div>
                            <div class="col">
                                <label>Product Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" value="">
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <div class="col">
                                <label>Description<span class="text-danger">(EN)</span></label>
                                <textarea class="form-control" name="description_en" id="tinymceExample"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <div class="col">
                                <label>Description<span class="text-danger">(AR)</span></label>
                                <textarea class="form-control" name="description_ar" id="tinymceExample2"
                                    rows="10"></textarea>
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
                        </div>

                        {{-- Tags --}}
                        @livewire('gt-manager.tags.tag-auto-complete')
         
                    </div>
                </div>
            </div>
        </div>
        {{-- Submit --}}
        <button class="btn btn-primary float-right" type="submit">Submit form</button>
    </Form>
</div>
@endsection
@section('script')
<script>
    function generateUniqueId() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var id = '';

            for (var i = 0; i < 10; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                var character = characters.charAt(randomIndex).toUpperCase(); // Convert character to uppercase
                id += character;
            }

            document.getElementById('sukGenerator').value = id;
        }






        // In your Blade view or a separate JavaScript file
document.addEventListener('livewire:load', function () {
    Livewire.hook('afterDomUpdate', () => {
        const tagsInput = document.getElementById('tags_tagsinput');
        if (tagsInput) {
            const tags = tagsInput.querySelectorAll('.tag span');
            tags.forEach(tag => {
                tag.addEventListener('click', () => {
                    tag.parentElement.remove(); // Remove tag when clicked
                });
            });
        }
    });
});

</script>
@endsection