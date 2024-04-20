<div>
    <div class="page-content">
        {{-- ====== Navagation ====== --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Manufacturers</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button wire:click="resetFields" type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0"
                    data-toggle="modal" data-target="#store-modal">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Manufacturer
                </button>
            </div>
        </nav>
        {{-- ====== All Manufacturers ====== --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card-body">
                            <h6 class="card-title">Manufacturers</h6>
                            <div class="row">
                                @foreach ($manufacturers as $manufacturer)
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                        <div class="border border-light rounded shadow-sm position-relative">
                                            <!-- 3 Dots -->
                                            <div class="dropdown position-absolute" style="top: 4px; right: 0;">
                                                <button class="btn p-1" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg text-muted pb-3px"
                                                        data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-left"
                                                    aria-labelledby="dropdownMenuButton">

                                                    <button type="button" wire:click="edit({{ $manufacturer->id }})"
                                                        class="dropdown-item d-flex align-items-center"
                                                        data-toggle="modal"
                                                        data-target="#editModal{{ $manufacturer['id'] }}">
                                                        <i data-feather="edit-2" class="icon-sm mr-2"></i>
                                                        <span>Edit</span>
                                                    </button>

                                                    <button type="button"
                                                        class="dropdown-item d-flex align-items-center"
                                                        data-toggle="modal"
                                                        data-target="#confirmDeleteModal{{ $manufacturer['id'] }}">
                                                        <i data-feather="trash" class="icon-sm mr-2"></i>
                                                        <span>Delete</span>
                                                    </button>

                                                </div>
                                            </div>
                                            <!-- Edit Modal -->
                                            <x-modal.edit title="Manufacturer" id="{{ $manufacturer->id }}">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Name <span
                                                            class="text-danger">(EN)</span></label>
                                                    <input type="text" class="form-control" wire:model='name_en'>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Name <span
                                                            class="text-danger">(AR)</span></label>
                                                    <input type="text" class="form-control" wire:model='name_ar'>
                                                </div>


                                                <div class="form-group">
                                                    <label> Logo</label>
                                                    <input type="file" wire:model="logo" class="file-upload-default" id="image" accept=".png">

                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info"
                                                            disabled="" placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-success"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                @if ($logo)
                                                    @if (is_string($logo))
                                                        <!-- If logo is a string (file path) -->
                                                        <img class="image-rec-full"
                                                            src="{{ asset('storage/' . $logo) }}" alt="Logo">
                                                    @else
                                                        <!-- If logo is an uploaded file -->
                                                        <img class="image-rec-full" src="{{ $logo->temporaryURL() }}"
                                                            alt="Temporary_Logo">
                                                    @endif
                                                @endif
                                            </x-modal.edit>
                                            <!-- delete Modal -->
                                            <x-modal.delete id="{{ $manufacturer['id'] }}"></x-modal.delete>
                                            <!-- image -->
                                            <div class="card-logo d-flex justify-content-center align-items-center">
                                                <img class="image-in-box"
                                                    src="{{ !empty($manufacturer->logo) ? asset('storage/' . $manufacturer->logo) : asset('gt_manager/media/no_image.jpg') }}"
                                                    alt="Wrong_Data">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">
                                            {{ $manufacturer->getTranslations('name')['en'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            {{-- {{ $manufacturer->links('pagination::bootstrap-5') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== Add Modal ====== --}}
        <x-modal.create title="manufacturer">
            <div class="form-group">
                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                <input type="text" class="form-control" wire:model="name_en" autocomplete="off"
                    placeholder="English Name" value="{{ old('name_en') ?? '' }}">
                @error('name_en')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                <input type="text" class="form-control" wire:model="name_ar" placeholder="Arabic Name"
                    value="{{ old('name_ar') ?? '' }}">
                @error('name_ar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>manufacturer Logo</label>
                <input type="file" wire:model="logo" accept="image/*" class="file-upload-default"
                    id="image">

                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                    </span>
                </div>
                @error('logo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($logo && !is_string($logo))
                    <img class="image-rec-full" src="{{ $logo->temporaryURL() }}" alt="">
                @endif
            </div>
        </x-modal.create>
    </div>
</div>
