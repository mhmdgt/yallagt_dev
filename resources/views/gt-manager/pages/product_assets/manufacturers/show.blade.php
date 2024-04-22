@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ====== Navagation ====== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('manufacturers.index') }}">Manufacturers</a>
                    </li>
                    <li class="breadcrumb-item"><a>Manufacturer Data</a></li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Product
                </button>
            </div>
        </nav>
        {{-- ====== Brand Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <img class="image-in-box"
                                src="{{ !empty($manufacturer->logo) ? url('storage/' . $manufacturer->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                alt="No Image">
                            <span class="profile-name ml-3 h4">{{ $manufacturer->name }}</span>
                            <td>
                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                    data-target="#EditCarBrand" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button type="button" class="btn btn-inverse-danger"
                                data-toggle="modal" data-target="#confirmDeleteModal{{ $manufacturer->id }}" title="Edit">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <x-modal.confirm-delete-modal route="{{ route('manufacturers.destroy', $manufacturer->id) }}"
                                    id="{{ $manufacturer->id }}" />
                            </td>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Edit Car Brand ========================== --}}
        <div class="modal fade" id="EditCarBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Car Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('manufacturers.update' , $manufacturer->id ) }}" class="forms-sample"
                            method="POST" enctype="multipart/form-data" id="car-brand">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $manufacturer->getTranslations('name')['en'] }}">
                                <small class="text-danger" id='en_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" autocomplete="off"
                                    value="{{ $manufacturer->getTranslations('name')['ar'] }}">
                                <small class="text-danger" id='ar_name-error'></small>
                            </div>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo" class="file-upload-default" id="image"
                                    accept=".png">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                    </span>
                                </div>
                                <small class="text-danger" id='logo-error'></small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img width="100px" id="showImage" class="image-rec-full"
                                    src="{{ !empty($manufacturer->logo) ? asset('storage/' . $manufacturer->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                    alt="No_IMG">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

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
