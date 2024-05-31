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
                            <span style="font-size: 22px; font-weight: 500;">Change Password</span>
                            <p class="mt-2 gt-gray">You are few steps away from personalizing your experience.</p>
                        </div>
                        <form method="POST" action="{{ route('yalla-gt.update-password') }}" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Old Password</label>
                                <input type="password" class="form-control " id="old_password" autocomplete="off"
                                    name="old_password">
                                <x-errors.display-validation-error property="old_password" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">New Password</label>
                                <input type="password" class="form-control " id="new_password" autocomplete="off"
                                    name="new_password">
                                <x-errors.display-validation-error property="new_password" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Confirm New Password</label>
                                <input type="password" class="form-control " id="new_password_confirmation"
                                    autocomplete="off" name="new_password_confirmation">
                                <x-errors.display-validation-error property="new_password" />
                            </div>
                            <button type="submit"
                                class="btn btn-light mt-2 rounded gradient-green-bg text-white float-right">
                                Change Password
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
