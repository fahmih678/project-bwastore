@extends('layouts.admin')

@section('title')
    Store Dashboard Transaction
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
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
                          >Produk Telah Dibayar</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-dikirim-tab"
                          data-bs-toggle="pill"
                          href="#pills-dikirim"
                          role="tab"
                          aria-controls="pills-dikirim"
                          aria-selected="false"
                          >Produk Dikirim</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-selesai-tab"
                          data-bs-toggle="pill"
                          href="#pills-selesai"
                          role="tab"
                          aria-controls="pills-selesai"
                          aria-selected="false"
                          >Produk Telah Sampai</a
                        >
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="pills-dibayar"
                        role="tabpanel"
                        aria-labelledby="pills-dibayar-tab"
                      >
                      Produk Telah Dibayar
                        @foreach ($dibayar as $bayar)
                            <a href="{{ route('dashboard-transactions-detail', $bayar->id) }}" class="card card-list d-block">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-1">
                                    <img src="{{ Storage::url($bayar->product->galleries->first()->photos ?? '') }}" class="img-thumbnail" alt="" />
                                  </div>
                                  <div class="col-md-4">{{ $bayar->product->name }}</div>
                                  <div class="col-md-3">{{ $bayar->product->user->store_name }}</div>
                                  <div class="col-md-3">{{ $bayar->created_at }}</div>
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
                        id="pills-dikirim"
                        role="tabpanel"
                        aria-labelledby="pills-dikirim-tab"
                      >
                      Produk Dikirim
                        {{-- @foreach ($sentProduct as $transaction)
                          <a href="{{ route('dashboard-myorder-detail', $transaction->transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" class="img-thumbnail"
                                    alt="" />
                                </div>
                                <div class="col-md-4">{{ $transaction->product->name }}</div>
                                <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                                <div class="col-md-3">{{ $transaction->created_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img src="/images/expand_more_24px.svg" alt="" />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach --}}
                      </div>
                      <div
                        class="tab-pane fade"
                        id="pills-selesai"
                        role="tabpanel"
                        aria-labelledby="pills-selesai-tab"
                      >
                      Produk Telah Sampai
                        {{-- @foreach ($finishTransaction $transaction)
                          <a href="{{ route('dashboard-myorder-detail', $transaction->transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" class="img-thumbnail"
                                    alt="" />
                                </div>
                                <div class="col-md-4">{{ $transaction->product->name }}</div>
                                <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                                <div class="col-md-3">{{ $transaction->created_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img src="/images/expand_more_24px.svg" alt="" />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
