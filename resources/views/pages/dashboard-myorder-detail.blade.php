@extends('layouts.dashboard')

@section('title')
    Store Dashboard Myorder
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $transaction->code }}</h2>
                <p class="dashboard-subtitle">My Orders Details</p>
            </div>
            <div class="dashboard-content" id="myorderDetails">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($myorder as $order)
                                        <div class="card card-list d-block">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-1" >
                                                        <img src="{{ Storage::url($order->product->galleries->first()->photos ?? '') }}"
                                                            class="img-thumbnail" alt="" />
                                                    </div>
                                                    <div class="col-md-3">{{ $order->product->name }}</div>
                                                    <div class="col-md-3">{{ $order->product->user->store_name }}</div>
                                                    <div class="col-md-3">{{ $order->updated_at }}</div>
                                                    <div class="row col-md-2">
                                                        <div>Shipping Status</div>
                                                        <div class="" v-if="$order->shipping_status == 'SHIPPING'">
                                                            Resi : {{ $order->resi }}
                                                        </div>
                                                        <div class="" v-else> 
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <h5>Transaction Information</h5>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                        
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Custumor Name</div>
                                                <div class="product-subtitle">{{ $transaction->user->name }}</div>
                                            </div>
                                        
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">
                                                    Date of Myorder
                                                </div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->created_at }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Payment Status</div>
                                                <div class="product-subtitle text-danger">
                                                    {{ $transaction->transaction_status }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Total Amount</div>
                                                <div class="product-subtitle">Rp {{ number_format($transaction->total_price) }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Mobile</div>
                                                <div class="product-subtitle">
                                                    {{ $transaction->user->phone_number }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <h5>Shipping Information</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Address 1</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->user->address_one }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Address 2</div>
                                                    <div class="product-subtitle">
                                                        {{ $transaction->user->address_two }}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">City</div>
                                                    <div class="product-subtitle"> {{App\Models\Province::find($transaction->user->provinces_id)->name }}</div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Province</div>
                                                    <div class="product-subtitle">{{App\Models\Regency::find($transaction->user->regencies_id)->name }}</div>
                                                </div>
                                    
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Postal Code</div>
                                                    <div class="product-subtitle">{{ $transaction->user->zip_code }}</div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Country</div>
                                                    <div class="product-subtitle">{{ $transaction->user->country }}</div>
                                                </div>
                                               <div class="col-12 col-md-3">
                                                <div class="product-title">Shipping Status</div>
                                                <div class="col-md-3">{{ $transaction->shipphing_status }}</div>
                                            
                                                <template v-if="{{ $transaction->shipping_status }} == 'SHIPPING'">
                                                    <div class="col-md-3">
                                                        <div class="product-title">Input Resi</div>
                                                        <input type="text" class="form-control" name="resi" v-model="resi" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-success mt-4 w-100">
                                                            Update Resi
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var myorderDetails = new Vue({
            el: "#myorderDetails",
            data: {
                status: "{{ $transaction->shipping_status }}",
                resi: "{{ $transaction->resi }}",
            },
        });

    </script>
@endpush --}}
