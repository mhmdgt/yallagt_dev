@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Shipping Services</li>
                </ol>
                {{-- ====== ADD NEW COMPANY ====== --}}
                <a href="{{ route('shipping-company.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Company
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
                                        <th>Name EN</th>
                                        <th>Manager</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('shipping-company.edit', $company->id) }}">
                                                    {{ $company->name }}
                                                </a>
                                            </td>
                                            <td>{{ $company->manager_name }}</td>
                                            <td>{{ $company->phone }}</td>
                                            <td>{{ $company->status }}</td>
                                            <td>{{ $company->created_at->diffForHumans() }}</td>
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
