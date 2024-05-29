@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <div class="profile-page tx-13">
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="col-md-4 col-xl-4 left-wrapper mb-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <img class="image-in-circle-100"
                                        src="{{ !empty($adminData->photo) ? url('media/' . $adminData->photo) :
                                        asset('gt_manager/media/no_image.jpg') }}"
                                        alt="profile">
                                    <span class="profile-name ml-3 h4">{{ $adminData->name }}</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Username:</label>
                                <p class="text-muted ">{{ $adminData->username }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Phone Numer:</label>
                                <p class="text-muted ">{{ $adminData->phone }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Email:</label>
                                <p class="text-muted ">{{ $adminData->email }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-14 font-weight-bold mb-1 text-uppercase">Joined:</label>
                                <p class="text-muted ">{{ $adminData->created_at->format('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title ">Update Profile</h6>
                                    <form method="POST" action="{{ route('admin.update-profile')}}"
                                    class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                autocomplete="off" name="name" value="{{ $adminData->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" name="username" value="{{ $adminData->username }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPhone1">Phone number</label>
                                            <input type="text" class="form-control" id="exampleInputPhone1"
                                                name="phone" value="{{ $adminData->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                name="email" value="{{ $adminData->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputadress1">Address</label>
                                            <input type="text" class="form-control" id="exampleInputadress1"
                                                name="address" value="{{ $adminData->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Profile photo</label>
                                            <input type="file" name="photo" class="file-upload-default" id="image">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-success"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmaill" class="form-label"> </label>
                                            <img id="showImage" class="image-in-circle-100"
                                                src="{{ !empty($adminData->photo) ? url('media/' . $adminData->photo) :
                                                asset('gt_manager/media/no_image.jpg') }}"
                                                alt="profile">
                                        </div>

                                        <button type="submit" class="btn btn-success mt-2 mr-2">Submit</button>
                                        <button class="btn mt-2 btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
