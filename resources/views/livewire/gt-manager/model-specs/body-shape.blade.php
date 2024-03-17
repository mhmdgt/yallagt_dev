<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('model-specs-index') }}">Model
                            Specs</a></li>
                    <li class="breadcrumb-item"><a>Table Name</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Spec Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-md-8">
                            <span class="ml-3 h4">Table Name</span>
                            <td class="col-6 col-md-4">
                                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                    data-toggle="modal" data-target="#store-body-shape" wire:click='toggleModal'>
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Type
                                </button>

                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== All Types ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Types</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Icon</th>
                                        <th>Type Name <span class="text-danger">(EN)</span></th>
                                        <th>Type Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- Loop Starts --}}
                                        @foreach ( $bodyShapes as $bodyShape)


                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>
                                                <img class="image-in-circle-75" src="{{ !empty($adminData->photo)
                                                        ? url('media/' . $adminData->photo)
                                                        : asset('gt_manager/assets/images/no_image.jpg') }}"
                                                    alt="profile">
                                            </div>
                                        </td>
                                        <td>{{$bodyShape->getTranslations('name')['en']}}</td>
                                        <td> {{$bodyShape->getTranslations('name')['ar']}}</td>

                                        <td>
                                            <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                                data-target="#editModel{{ $bodyShape->id }}" title="Edit">
                                                <i data-feather="edit"></i>
                                            </button>

                                            <a href="#" class="btn btn-inverse-danger" data-confirm-delete="true">
                                                delete
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <div class="modal fade" id="editModel{{ $bodyShape->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Model</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1>{{ $bodyShape->name }}</h1>
                                                    <form class="forms-sample car-brand-model-edit" method="POST"
                                                        wire:submit.prevent='update' enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(EN)</span></label>
                                                            <input type="text" class="form-control" 
                                                                autocomplete="off"
                                                                value="{{ $bodyShape->getTranslations('name')['en'] }}">
                                                            @error('name_en')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name <span
                                                                    class="text-danger">(AR)</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $bodyShape->getTranslations('name')['ar'] }}">
                                                            @error('name_ar')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
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
                                    {{-- Loop Ends --}}
                                </tbody>
                            </table>
                        </div>
                        {{ $bodyShapes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @error('name_en')
    <small class="text-danger">{{ $message }}</small>
    @enderror

    {{-- ========================== Add body sheps ========================== --}}
    @if($showModal)
    <div class="modal fade show" id="store-body-shape" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: block; padding-left: 17px;" aria-modal="true">
        @else
        <div class="modal fade" id="store-body-shape" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            @endif
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Body Shape</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="forms-sample store-body-shape" wire:submit.prevent='store'
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" wire:model="name_en" autocomplete="off"
                                    placeholder="English Name" value="{{ old('name_en')??'' }}">
                                @error('name_en')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" wire:model="name_ar" placeholder="Arabic Name"
                                    value="{{ old('name_ar')??'' }}">
                                @error('name_ar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" wire:model="logo" class="file-upload-default" id="image">

                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image" wire:model="logo">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img id="showImage" class="image-rec-full"
                                    src="{{ asset('gt_manager/assets/images/no_image.jpg') }}" alt="...">
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