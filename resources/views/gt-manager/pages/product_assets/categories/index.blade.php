@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Product Categories</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Category
                </button>

                {{-- ========================== Add category ========================== --}}
        <div class="modal fade" id="addNewCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product-categories.store') }}" method="POST" enctype="multipart/form-data"
                        id="car-brand">
                        @csrf
                        <div class="form-group">
                            <label>Name <span class="text-danger">(EN)</span></label>
                            <input type="text" class="form-control" name="name_en" placeholder="English Name" value="{{ old('name_en') }}">
                            <x-errors.display-validation-error property="name_en" />
                        </div>
                        <div class="form-group">
                            <label>Name <span class="text-danger">(AR)</span></label>
                            <input type="text" class="form-control" name="name_ar" placeholder="English Name" value="{{ old('name_ar') }}">
                        </div>

                        <div class="form-group">
                            <label>Brand Logo</label>
                            <input type="file" name="logo" class="file-upload-default" accept=".png">

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled=""
                                    placeholder="Upload Image" name="logo">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmaill" class="form-label"> </label>
                            <img id="showImage" class="image-rec-full"
                                src="{{ asset('gt_manager/media/no_image.jpg') }}" alt="...">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="add_employee_btn" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
            </div>
        </nav>
        {{-- ========================== All Categories ========================== --}}
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            <h6 class="card-title">All Categories</h6>
                            <div class="row">
                                {{-- LOOP --}}
                                @foreach ($categories as  $category)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                    <a href="{{ route('product-categories.show', $category->translatedSlug) }}">


                                        <div class="border border-light rounded shadow-sm">
                                            <div class="card-logo ">
                                                <img width="100px"
                                                    src="{{ display($category->logo) }}"
                                                    alt="No_IMG">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">{{  $category->name }}</p>
                                    </a>
                                </div>
                                @endforeach
                                {{-- LOOP --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @if ($errors->any() || Session::has('success') || Session::has('fail'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        Toast.fire({
                            icon: 'error',
                            title: '{{ $error }}'
                        });
                    @endforeach
                @endif

                @if (Session::has('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('success') }}'
                    });
                @elseif (Session::has('fail'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ Session::get('fail') }}'
                    });
                @endif
            });
        </script>
    @endif
@endsection
