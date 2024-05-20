@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a>Contact Us</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <Form action="{{ route('cst_web.update') }}" method="POST">
            @csrf
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title text-primary">Contact Details</h6>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Name <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ get_contact_us()->getTranslation('site_name', 'en') }}">
                                    @error('name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Name <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="name_ar" dir="auto"
                                        value="{{ get_contact_us()->getTranslation('site_name', 'ar') }}">
                                    @error('name_ar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Headqurter address <span class="text-danger">(EN)</span></label>
                                    <input type="text" class="form-control" name="headqurter_address_en"
                                        value="{{ get_contact_us()->getTranslation('headqurter_address', 'en') }}">
                                    @error('headqurter_address_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Headqurter address <span class="text-danger">(AR)</span></label>
                                    <input type="text" class="form-control" name="headqurter_address_ar" dir="auto"
                                        value="{{ get_contact_us()->getTranslation('headqurter_address', 'ar') }}">
                                    @error('headqurter_address_ar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Hotline</label>
                                    <input type="number" class="form-control" name="hotline"
                                        value="{{ get_contact_us()->hotline }}">
                                    @error('hotline')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone"
                                        value="{{ get_contact_us()->phone }}">
                                    @error('phone_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Support Email</label>
                                    <input type="text" class="form-control" name="support_email"
                                        value="{{ get_contact_us()->support_email }}">
                                    @error('support_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="card-title mt-4 text-primary">Social Media Links</h6>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ get_contact_us()->facebook }}">
                                    @error('facebook')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ get_contact_us()->instagram }}">
                                    @error('instagram')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="youtube"
                                        value="{{ get_contact_us()->youtube }}">
                                    @error('youtube')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{ get_contact_us()->twitter }}">
                                    @error('twitter')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok"
                                        value="{{ get_contact_us()->tiktok }}">
                                    @error('tiktok')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin"
                                        value="{{ get_contact_us()->linkedin }}">
                                    @error('linkedin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp"
                                        value="{{ get_contact_us()->tiktok }}">
                                    @error('whatsapp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Google Maps</label>
                                    <input type="text" class="form-control" name="google_maps"
                                        value="{{ get_contact_us()->linkedin }}">
                                    @error('google_maps')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-primary float-right" type="submit">Save Changes</button>
        </Form>


    </div>
@endsection
