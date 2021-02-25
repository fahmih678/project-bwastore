@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                    This is Kurma Store Dashboard
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Customer</div>
                                <div class="dashboard-card-subtitle">{{ $customer }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Revenue</div>
                                <div class="dashboard-card-subtitle">${{ $revenue }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">Transaction</div>
                                <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transactions</h5>
                        <a href="{{ url('/dashboard/transactions/{id}') }}" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/product-details-1.jpg" class="img-thumbnail" alt="" />
                                    </div>
                                    <div class="col-md-4">Kurma</div>
                                    <div class="col-md-3">Fahmi Habibi</div>
                                    <div class="col-md-3">January 12, 2021</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/expand_more_24px.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/dashboard/transactions/{id}') }}" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/product-details-1.jpg" class="img-thumbnail" alt="" />
                                    </div>
                                    <div class="col-md-4">Kurma</div>
                                    <div class="col-md-3">Fahmi Habibi</div>
                                    <div class="col-md-3">January 12, 2021</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/expand_more_24px.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/dashboard/transactions/{id}') }}" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/product-details-1.jpg" class="img-thumbnail" alt="" />
                                    </div>
                                    <div class="col-md-4">Kurma</div>
                                    <div class="col-md-3">Fahmi Habibi</div>
                                    <div class="col-md-3">January 12, 2021</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/expand_more_24px.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
