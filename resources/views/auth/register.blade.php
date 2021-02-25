@extends('layouts.auth')

@section('title')
    Registration    
@endsection

@section('content')

    {{-- buat sendiri --}}
    <div class="page-content page-auth" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-4">
                        <h2> Memulai untuk jual beli, <br />Menjadi lebih mudah</h2>
                        <form 
                            method="POST" 
                            action="{{ route('register') }}"
                            class="d-grid gap-0.5 mt-3">
                            @csrf

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}" 
                                    v-model="name"
                                    required 
                                    autocomplete="name" 
                                    autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input 
                                    id="email" 
                                    v-model="email"
                                    @change="checkForEmailAvailability()"
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    :class="{ 'is-invalid' : this.email_unavailable }"
                                    name="email"
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password"
                                    required 
                                    autocomplete="new-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input 
                                    id="password-confirm" 
                                    type="password" 
                                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                                    name="password_confirmation"
                                    required 
                                    autocomplete="new-password">
                                
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Store</label>
                                <p class="text-muted">Apakah anda ingin membuat toko</p>
                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        name="is_store_open" 
                                        id="openStoreTrue"
                                        v-model="is_store_open" 
                                        :value="true" 
                                    />
                                    <label 
                                        for="openStoreTrue"
                                        class="form-check-label"
                                    >
                                        Iya, boleh
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio"
                                        class="form-check-input"
                                        name="is_store_open" 
                                        id="openStoreFalse"
                                        v-model="is_store_open" 
                                        :value="false"
                                    />
                                    <label 
                                        for="openStoreFalse" 
                                        class="form-check-label">
                                        Engga, makasih
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label for="store_name">Nama Toko</label>
                                <input 
                                    type="text"
                                    id="store_name"
                                    v-model="store_name"
                                    class="form-control @error('store_name') is-invalid @enderror"
                                    name="store_name"
                                    required
                                    autocomplete
                                    autofocus>
                                @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label for="">Kategori</label>
                                <select name="categories_id" id="" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button 
                                type="submit" 
                                class="btn btn-success mt-4"
                                :disabled="this.email_unavailable"
                                >
                                Sign Up Now
                            </button>
                            <a href="{(route('login'))}" class="btn btn-signup mt-2">
                                Back to Sign In
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: "#register",
            mounted() {
                AOS.init();
            },
            methods: {
                checkForEmailAvailability: function() {
                    var self = this;
                    // Make a request for a user with a given ID
                    axios.get('{{ route('api-register-check') }}',{
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if (response.data == 'Available') {
                            self.$toasted.show(
                                "Email tersedia", 
                                {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                                }
                            );
                            self.email_unavailable = false;      
                        } else {
                            self.$toasted.error(
                                "Maaf, email sudah terdaftar di sistem",
                                {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    });
                }
            },
            data() {
                return {
                    name: "",
                    email: "",
                    is_store_open: "",
                    store_name: "",
                    email_unavailable:"",
                }
            },
        });

    </script>
@endpush
