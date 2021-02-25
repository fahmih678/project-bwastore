@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <!-- Carousel -->
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
                            <o class="carousel-indicators">
                                <li class="active" data-bs-target="#storeCarousel" data-bs-ride-to="0"></li>
                                <li data-bs-target="#storeCarousel" data-bs-ride-to="1"></li>
                                <li data-bs-target="#storeCarousel" data-bs-ride-to="2"></li>
                            </o>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/banner.jpg" alt="banner" class="d-block w-100" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" alt="banner" class="d-block w-100" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" alt="banner" class="d-block w-100" />
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#storeCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#storeCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Trend Categories -->
        <section class="store-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementCategory = 0 @endphp
                    @forelse ($categories as $category)
                        <div class="col-6 col-md-4 col-lg-2 m-auto" data-aos="fade-up"
                            data-aos-delay="{{ $incrementCategory += 100 }}">
                            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                <div class="categories-kurma">
                                    <img src="{{ Storage::url($category->photos) }}" alt="" class="w-100" class="w-100" />
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Categories Found
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
        <!-- Store New Product -->
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Products</h5>
                    </div>
                </div>
                <!-- Thumbnail product -->
                @php
                    $incrementProduct = 0;
                @endphp
                <div class="row">
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up"
                        data-aos-delay="{{ $incrementProduct += 100 }}">
                        <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div 
                                    class="product-image" 
                                    style="
                                        @if($product->galleries->count()) 
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else 
                                            background-color: #eee
                                        @endif
                                            
                                    ">
                                </div>
                            </div>
                            <div class="product-text">{{ $product->name }}</div>
                            <div class="product-price">Rp {{ number_format($product->price) }}/kg</div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Products Found
                    </div>
                @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
