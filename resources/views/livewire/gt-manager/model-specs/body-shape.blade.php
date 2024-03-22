<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('spec-categories') }}">Specs
                            Categories</a></li>
                    <li class="breadcrumb-item"><a>Body Shape</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Spec Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex align-items-center">
                            <span class="h4">Body Shapes</span>
                            <td>
                                <button wire:click="resetFields" type="button"
                                    class="btn btn-inverse-primary btn-icon-text ml-4" data-toggle="modal"
                                    data-target="#store-body-shape">
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
                                        @foreach ($bodyShapes as $bodyShape)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div>
                                                    <img class="image-in-circle-75"
                                                        src="{{ !empty($bodyShape->photo)
                                                            ? asset('storage/' . $bodyShape->logo)
                                                            : asset('gt_manager/assets/images/no_image.jpg') }}"
                                                        alt="profile">
                                                </div>
                                            </td>
                                            <td>{{ $bodyShape->getTranslations('name')['en'] }}</td>
                                            <td> {{ $bodyShape->getTranslations('name')['ar'] }}</td>

                                            <td class="d-flex">
                                                <button class="btn btn-inverse-warning mr-2"
                                                    wire:click="edit({{ $bodyShape->id }})" data-toggle="modal"
                                                    data-target="#editModel{{ $bodyShape->id }}" title="Edit">
                                                    Edit
                                                </button>

                                                {{-- <button wire:click.prevent='deleteConfermation({{ $bodyShape->id }})'
                                                    class="btn btn-danger"> Delete</button> --}}

                                                <form wire:submit.prevent='deleteConfirmation({{ $bodyShape->id }})''>
                                                    <button type="submit" class="btn btn-danger">delete</button>
                                                </form>


                                            </td>
                                    </tr>
                                    {{-- ========================== Edit Modal ========================== --}}
                                    <x-model.edit title="Body Shape" id="{{ $bodyShape->id }}">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name <span
                                                    class="text-danger">(EN)</span></label>
                                            <input type="text" class="form-control" autocomplete="off"
                                                wire:model='name_en'>
                                            @include('gt-manager.error.error', ['property' => 'name_en'])
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name <span
                                                    class="text-danger">(AR)</span></label>
                                            <input type="text" class="form-control" wire:model='name_ar'>
                                            @include('gt-manager.error.error', ['property' => 'name_ar'])
                                        </div>


                                        <div class="form-group">
                                            <label> Logo</label>
                                            <input type="file" wire:model="logo" class="file-upload-default"
                                                id="image">

                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info"
                                                    disabled="" placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-success"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                            @include('gt-manager.error.error', ['property' => 'logo'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmaill" class="form-label"> </label>
                                            <img id="showImage" class="image-rec-full"
                                                src="{{ asset('gt_manager/assets/images/no_image.jpg') }}"
                                                alt="...">
                                        </div>
                                    </x-model.edit>
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
    {{-- ========================== Add body Shapes ========================== --}}
    <x-model.create title="body shape">
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

        <h6 class="mt-4 mb-2">Media Section</h6>
        <div class="form-group">
            <label>Brand Logo</label>
            <input type="file" wire:model="logo" class="file-upload-default" id="image">

            <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled=""
                    placeholder="Upload Image">
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
            <img id="showImage" class="image-rec-full" src="{{ asset('gt_manager/assets/images/no_image.jpg') }}"
                alt="...">
        </div>
    </x-model.create>

</div>

@script
    <script>
        $wire.on('dispatch-model', () => {
            $('.dispatch-model').modal('hide');
        });

        window.addEventListener('alert', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                position: data.position,
                icon: data.type,
                title: data.title,
                showConfirmButton: true,
                timer: 1500
            });
        })
    </script>
@endscript
