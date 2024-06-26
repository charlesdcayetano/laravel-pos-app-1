@extends('layouts.app')

@section('content-header', 'Home')

@section('content')
    <div class="row">
        {{-- Total Users Card --}}
        <div class="col-12 col-md-4 flex">
            <div class="card flex-fill border-0">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>{{ count($users) }}</h4>
                            <p class="mb-0">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Products Card --}}
        <div class="col-12 col-md-4 flex">
            <div class="card flex-fill border-0">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>{{ count($products) }}</h4>
                            <p class="mb-0">Total Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Orders Card --}}
        <div class="col-12 col-md-4 flex">
            <div class="card flex-fill border-0">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>{{ count($orders) }}</h4>
                            <p class="mb-0">Total Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Income Card --}}
        <div class="col-12 col-md-6 flex">
            <div class="card flex-fill border-0">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>0</h4>
                            <p class="mb-0">Total Income</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Customers Card --}}
        <div class="col-12 col-md-6 flex">
            <div class="card flex-fill border-0">
                <div class="card-body card-label p-0 d-flex flex-fill">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>0</h4>
                            <p class="mb-0">Total Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
