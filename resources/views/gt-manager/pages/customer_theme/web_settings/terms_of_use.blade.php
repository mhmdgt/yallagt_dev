@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a>Terms of Use</a></li>
                </ol>
            </div>
        </nav>
        {{-- ====== Content ====== --}}
        <Form action="{{ route('web-settigns.termsUpdate') }}" method="POST">
            @csrf
            {{-- Contact Details --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title text-primary">Terms of Use</h6>
                            {{-- row --}}
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Content<span class="text-danger">(EN)</span></label>
                                    <textarea class="form-control" name="content_en" id="tinymceExample" rows="10">
                                        {{ $terms->getTranslations('content')['en'] }}
                                    </textarea>
                                    <x-errors.display-validation-error property="content_en" />
                                </div>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col">
                                    <label>Content<span class="text-danger">(AR)</span></label>
                                    <textarea class="form-control" name="content_ar" id="tinymceExample2" rows="10">
                                        {{ $terms->getTranslations('content')['ar'] }}
                                    </textarea>
                                    <x-errors.display-validation-error property="content_ar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Submit --}}
            <button class="btn btn-success float-right" type="submit">Save Changes</button>
        </Form>
    </div>
@endsection
