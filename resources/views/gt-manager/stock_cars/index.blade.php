@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager-home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">All Stock Brands</li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Content Table ==========================  --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Models</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Model Name <span class="text-danger">(EN)</span></th>
                                        <th>Total Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>1</td>
                                        <td> <a href="{{ route('all-stock-models') }}">Kia</a></td>
                                        <td>15</td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
