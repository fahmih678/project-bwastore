@extends('layouts.dashboard')

@section('title')
    Store Dashboard My Order Transaction
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Order Transactions</h2>
                <p class="dashboard-subtitle">
                  Big result start from the small one
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12 mt-2">
                    <!-- Pills -->
                    <ul
                      class="nav nav-pills mb-3"
                      id="pills-tab"
                      role="tablist"
                    >
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="pills-pay-tab"
                          data-bs-toggle="pill"
                          href="#pills-pay"
                          role="tab"
                          aria-controls="pills-pay"
                          aria-selected="true"
                          >Dibayar</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-sent-tab"
                          data-bs-toggle="pill"
                          href="#pills-sent"
                          role="tab"
                          aria-controls="pills-sent"
                          aria-selected="false"
                          >Dikirim</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-finish-tab"
                          data-bs-toggle="pill"
                          href="#pills-finish"
                          role="tab"
                          aria-controls="pills-finish"
                          aria-selected="false"
                          >Selesai</a
                        >
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="pills-pay"
                        role="tabpanel"
                        aria-labelledby="pills-pay-tab"
                      >
                        Pay
                        @foreach ($pendingOrder as $order)
                          <a href="{{ route('dashboard-myorder-detail', $order->transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img src="{{ Storage::url($order->product->galleries->first()->photos ?? '') }}" class="img-thumbnail"
                                    alt="" />
                                </div>
                                <div class="col-md-4">{{ $order->product->name }}</div>
                                <div class="col-md-3">{{ $order->product->user->store_name }}</div>
                                <div class="col-md-3">{{ $order->created_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img src="/images/expand_more_24px.svg" alt="" />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                      <div
                        class="tab-pane fade"
                        id="pills-sent"
                        role="tabpanel"
                        aria-labelledby="pills-sent-tab"
                      >
                        Sent
                        @foreach ($shippingOrder as $order)
                          <a href="{{ route('dashboard-myorder-detail', $order->transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img src="{{ Storage::url($order->product->galleries->first()->photos ?? '') }}" class="img-thumbnail" alt="" />
                                </div>
                                <div class="col-md-4">{{ $order->product->name }}</div>
                                <div class="col-md-3">{{ $order->product->user->store_name }}</div>
                                <div class="col-md-3">{{ $order->updated_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img src="/images/expand_more_24px.svg" alt="" />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                      <div
                        class="tab-pane fade"
                        id="pills-finish"
                        role="tabpanel"
                        aria-labelledby="pills-finish-tab"
                      >
                        Finish
                        @foreach ($successOrder as $order)
                          <a href="{{ route('dashboard-myorder-detail', $order->transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img src="{{ Storage::url($order->product->galleries->first()->photos ?? '') }}" class="img-thumbnail" alt="" />
                                </div>
                                <div class="col-md-4">{{ $order->product->name }}</div>
                                <div class="col-md-3">{{ $order->product->user->store_name }}</div>
                                <div class="col-md-3">{{ $order->updated_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img src="/images/expand_more_24px.svg" alt="" />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
