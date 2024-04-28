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
        </div>
    </nav>
    {{-- ========================== All Categories ========================== --}}
    <Form action="" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- General Details --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row pt-0 mt-2">
                            <div class="col">
                                <label>Blog Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                    name="name" value="">
                            </div>
                            <div class="col">
                                <label>Blog Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                    name="name" value="">
                            </div>
                        </div>

                      
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- Categories --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Categories</h6>
                        <div class="form-group row pt-0">
                            <div class="col">
                                <label>Category</label>
                                <select class="js-example-basic-multiple w-100" name="blog_category_id">
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Compatible With --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Compatible With</h6>
                        {{-- <div id="show_item"> --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="TX">Kia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <select class="js-example-basic-single w-100">
                                            <option value="KN">Cerato</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-0">
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
                            {{-- <button class="btn btn-success add_item_btn">Add More</button> --}}
                            {{--
                        </div> --}}
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
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group pt-0 mt-4">
                            <label>PDF Datasheet</label>
                            <input type="file" name="brochure" accept="application/pdf" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" placeholder="Upload Borchur">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-light" type="button">Upload</button>
                                </span>
                            </div>
                            @error('brochure')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- Tags --}}
        <div class="row">
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
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios5"
                                            value="active">
                                        Active
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios6"
                                            value="hidden">
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
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@section('script')
<script src="{{ asset('gt_manager/assets/js/summernote/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('gt_manager/assets/js/summernote/bootstrap-3.4.1.js') }}"></script>
<script src="{{ asset('gt_manager/assets/js/summernote/summernote.min.js') }}"></script>

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


        // Summernote
        $(document).ready(function() {
  
      $('#content_en').summernote({
        placeholder: 'Blog Content...',
        tabsize: 2,
        height: 400,
       
      });
     
    }); 

   
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#content_en').summernote({
        height: 400
    });
    
</script>


@endsection



    $(document).ready(function() {
    console.log("ffff")
      $('#content').summernote({
        placeholder: 'Blog Content...',
        tabsize: 2,
        height: 400,
       
      });
    }); --}}

    {{-- <div class="mb-3 col-12">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea id="content" class="form-control" id="exampleFormControlTextarea1" rows="10"
          name="content">{{ old('content')??'' }}</textarea>
        @error('content')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div> --}}

{{-- 
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">


<!-- include summernote css/js -->
<link href="{{ asset('dashboard/assets/css/summernote.min.css') }}" rel="stylesheet"> --}}