@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Blogs</li>
                </ol>
                <a href="{{ route('blogs.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Create Blog
                </a>
            </div>
        </nav>
        {{-- ========================== Brand Table ==========================  --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Brands</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Blog Title <span class="text-danger">(EN)</span></th>
                                        <th>Category</th>
                                        <th>status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <td>{{ $blog->id }}</td>
                                        <td><a href="{{route('blogs.edit' , $blog->slug)}}">{{ $blog->title }}</a></td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>{{ $blog->status }}</td>
                                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="position-relative">
                                                    <!-- Dropdown button positioned at top-left corner -->
                                                    <div class="dropdown">
                                                        <button class="btn p-1" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icon-lg text-muted pb-3px"
                                                                data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item d-flex align-items-center"
                                                            href="{{route('blogs.edit' , $blog->slug)}}">
                                                                <i data-feather="edit-2" class="icon-sm mr-2"></i>
                                                                <span class="">Edit</span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="">
                                                                <i data-feather="folder-plus" class="icon-sm mr-2"></i>
                                                                <span>Download</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
