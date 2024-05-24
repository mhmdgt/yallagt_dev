<div>
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('spec-categories.index') }}">Specs Categories</a></li>
                    <li class="breadcrumb-item"><a>Fuel Types</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Spec Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <span class="h4">Fuel Types</span>
                            <td>
                                <button wire:click="resetFields" type="button"
                                    class="btn btn-inverse-primary btn-icon-text ml-4" data-toggle="modal"
                                    data-target="#store-modal">
                                    + Add
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
                            <table class="table">
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
                                        @foreach ($fuel_types as $type)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div>
                                                    <img class="image-in-circle-75"
                                                        src="{{ !empty($type->logo) ? asset('storage/' . $type->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                                        alt="profile">
                                                </div>
                                            </td>
                                            <td>{{ $type->getTranslations('name')['en'] }}</td>
                                            <td> {{ $type->getTranslations('name')['ar'] }}</td>
                                            <td class="d-flex">
                                                <button class="btn btn-inverse-warning mr-2"
                                                    wire:click="edit({{ $type->id }})" data-toggle="modal"
                                                    data-target="#editModal{{ $type->id }}" title="Edit">
                                                    Edit
                                                </button>
                                                <x-modal.delete id="{{ $type->id }}">
                                                    <button type="button" class="btn btn-inverse-danger"
                                                        data-toggle="modal"
                                                        data-target="#confirmDeleteModal{{ $type->id }}">Delete</button>
                                                </x-modal.delete>
                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <x-modal.edit title="type" id="{{ $type->id }}">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name <span
                                                    class="text-danger">(EN)</span></label>
                                            <input type="text" class="form-control" wire:model='name_en'>
                                            <x-errors.display-validation-error property="name_en" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name <span
                                                    class="text-danger">(AR)</span></label>
                                            <input type="text" class="form-control" wire:model='name_ar'>
                                            <x-errors.display-validation-error property="name_ar" />
                                        </div>

                                        <div class="form-group">
                                            <label> Logo</label>
                                            <input type="file" wire:model="logo" class="file-upload-default"
                                                accept=".png" id="image">

                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info"
                                                    disabled="" placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-success"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                            <x-errors.display-validation-error property="logo" />
                                        </div>
                                        @if ($logo)
                                            @if (is_string($logo))
                                                <!-- If logo is a string (file path) -->
                                                <img class="image-rec-full" src="{{ asset('storage/' . $logo) }}"
                                                    alt="Logo">
                                            @else
                                                <!-- If logo is an uploaded file -->
                                                <img class="image-rec-full" src="{{ $logo->temporaryURL() }}"
                                                    alt="Temporary Logo">
                                            @endif
                                        @endif
                                    </x-modal.edit>
                                    @endforeach
                                    {{-- Loop Ends --}}
                                </tbody>
                            </table>
                        </div>
                        {{ $fuel_types->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================== Add body Shapes ========================== --}}
    <x-modal.create title="type">
        <div class="form-group">
            <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
            <input type="text" class="form-control" wire:model="name_en" autocomplete="off"
                placeholder="English Name" value="{{ old('name_en') ?? '' }}">
                <x-errors.display-validation-error property="name_en" />
        </div>
        <div class="form-group">
            <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
            <input type="text" class="form-control" wire:model="name_ar" placeholder="Arabic Name" dir="auto"
                value="{{ old('name_ar') ?? '' }}">
                <x-errors.display-validation-error property="name_ar" />
        </div>
        <div class="form-group">
            <label>Brand Logo</label>
            <input type="file" wire:model="logo" class="file-upload-default" id="image" accept=".png">

            <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled=""
                    placeholder="Upload Image">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                </span>
            </div>
            <x-errors.display-validation-error property="logo" />
        </div>
        @if ($logo && !is_string($logo))
            <img class="image-rec-full" src="{{ $logo->temporaryURL() }}" alt="">
        @endif
    </x-modal.create>
</div>
