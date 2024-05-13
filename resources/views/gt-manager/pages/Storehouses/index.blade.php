@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Storehouses</li>
                </ol>
                <a href="{{ route('storehouses.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    New Storehouse
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
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Manager Name</th>
                                        <th>Phone</th>
                                        <th>Government</th>
                                        <th>Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($storehouses as $storehouse)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$storehouse->name}}</td>
                                        <td>{{$storehouse->manager_name}}</td>
                                        <td>{{$storehouse->phone}}</td>
                                        <td>{{ $governorates[$storehouse->governorate_id] }}</td>
                                        <td>{{$storehouse->area}}</td>
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
