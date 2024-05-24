@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div">
        @include('yalla-gt.partials.account_head')
        {{-- Account --}}
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body ar-style">
                        <div class="p-2 mb-4 text-dark ar-style">
                            <i class="bi bi-pencil-square ml-1 mr-1"></i>
                            <span style="font-size: 22px; font-weight: 500;" >Update Profile</span>
                            <p class="mt-2 gt-gray">You are few steps away from personalizing your experience.</p>
                        </div>
                        <form method="POST" action="{{ route('user.update-profile') }}" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $userData->name }}">
                                <x-errors.display-validation-error property="name" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $userData->username }}">
                                <x-errors.display-validation-error property="username" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone1">Phone number</label>
                                <input type="text" class="form-control" name="phone" value="{{ $userData->phone }}">
                                <x-errors.display-validation-error property="phone" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ $userData->email }}">
                                <x-errors.display-validation-error property="email" />
                            </div>
                            <div class="form-group">
                                <label>Profile photo</label>
                                {{-- <input type="file" name="photo" class="file-upload-default" id="image"> --}}
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img id="showImage" class="image-in-circle-100" src="" alt="">
                                <img class="image-in-box ml-4 mr-2" src="{{ asset('yalla_gt/media/no_image.jpg') }}"
                                    alt="No Image">
                            </div> --}}

                            <button type="submit" class="btn btn-light mt-2 rounded gradient-green-bg text-white float-right">
                                <i class="bi bi-bookmark-check"></i>
                                Save Updates
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    {{-- @include('yalla-gt.layout.upper-footer') --}}
    @include('yalla-gt.layout.footer')
@endsection
