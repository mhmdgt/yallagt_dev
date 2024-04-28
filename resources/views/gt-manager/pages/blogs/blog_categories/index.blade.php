@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ========================== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Categories Blog </li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#blog-category-add">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Category Blog
                </button>
            </div>
        </nav>
        {{-- ========================== All category ========================== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Category Blog</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>category Name <span class="text-danger">(EN)</span></th>
                                        <th>category Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($categories as $category)
                                            <td>{{ $loop->iteration }}</td>
                                            <td> <img id="showImage" class="image-rec-full"
                                                    src="{{ display_img($category->image) }}" alt="..."></td>
                                            <td> {{ $category->getTranslations('name')['en'] }}</td>
                                            <td> {{ $category->getTranslations('name')['ar'] }}</td>

                                            <td>
                                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                    data-target="#editcategory{{ $category->id }}" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-inverse-danger" data-toggle="modal"
                                                    data-target="#confirmDeleteModal{{ $category->slug }}" title="Edit">
                                                    <i class="bi bi-trash3"></i>
                                                </button>

                                                <x-modal.confirm-delete-modal
                                                    route="{{ route('blog-categories.destroy', $category->slug) }}"
                                                    id="{{ $category->slug }}" />

                                            </td>
                                    </tr>
                                    {{-- ========================== Editcategory ========================== --}}
                                    <div class="modal fade" id="editcategory{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample car-brand-category-edit" method="POST"
                                                        data-category-id="{{ $category->id }}"
                                                        action="{{ route('blog-categories.update', $category->slug) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" hidden name="id"
                                                            value="{{ $category->id }}">
                                                        <input hidden type="text" class="form-control" name="id"
                                                            value="{{ $category->id }}">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(EN)</span></label>
                                                            <input type="text" class="form-control" name="name_en"
                                                                autocomplete="off" placeholder="English Name"
                                                                value="{{ $category->getTranslations('name')['en'] }}">
                                                            <small class="text-danger" id='en_name-error'></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(AR)</span></label>
                                                            <input type="text" class="form-control" name="name_ar"
                                                                placeholder="Arabic Name"
                                                                value="{{ $category->getTranslations('name')['ar'] }}">

                                                            <small class="text-danger" id='ar_name-error'></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Category Image</label>
                                                            <input type="file" name="image"
                                                                class="file-upload-default" accept=".png,.jpg">
                                                            <div class="input-group col-xs-12">
                                                                <input type="text" class="form-control file-upload-info"
                                                                    disabled="" placeholder="Upload Image"
                                                                    name="logo">
                                                                <span class="input-group-append">
                                                                    <button class="file-upload-browse btn btn-success"
                                                                        type="button">Upload</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmaill" class="form-label"> </label>
                                                            <img id="showImage" class="image-rec-full"
                                                                src="{{ display_img($category->image) }}" alt="...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" id="add_employee_btn"
                                                                class="btn btn-primary">Save
                                                                changes</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Add category ========================== --}}
        <div class="modal fade" id="blog-category-add" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('blog-categories.store') }}" method="POST" enctype="multipart/form-data"
                            id="car-brand">
                            @csrf

                            <div class="form-group">
                                <label>Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" placeholder="English Name">
                                <x-errors.display-validation-error property="name_en" />
                            </div>
                            <div class="form-group">
                                <label>Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" placeholder="English Name">
                            </div>

                            <div class="form-group">
                                <label>Category Image</label>
                                <input type="file" name="image" class="file-upload-default" accept=".png,.jpg">

                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info"
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
