@extends('gt-manager.layout.app')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Stock Car Brands</li>
                </ol>
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
                                        <th>Brands Name <span class="text-danger">(EN)</span></th>
                                        <th>Total Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $brands as $brand )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a href="{{ route("stock-car.show" , $brand->slug  ) }}">{{ $brand->name }}</a></td>
                                        {{-- <td><a href="{{ route('stock-car.show', ['brand' => $brand, 'modelName' => $modelName]) }}">Show</a></td> --}}
                                        <td>15</td>
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
