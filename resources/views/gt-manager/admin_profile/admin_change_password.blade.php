@extends('gt-manager.aBody.app-layout')
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
                                        src="{{ !empty($adminData->photo) ? url('media/' . $adminData->photo) : url('gt-manager/image/no_image.jpg') }}"
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
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title ">Change Password</h6>
                                    <form method="POST" action="{{ route('admin-password-update') }}" class="forms-sample">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputName1">Old Password</label>
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" autocomplete="off" name="old_password">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">New Password</label>
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" autocomplete="off" name="new_password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Confirm New Password</label>
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password_confirmation" autocomplete="off"
                                                name="new_password_confirmation">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>




                                        <button type="submit" class="btn btn-success mt-2 mr-2">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- middle wrapper end -->
            </div>
        </div>

    </div>
@endsection
