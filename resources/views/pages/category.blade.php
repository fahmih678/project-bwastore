@extends('layouts.app')

@section('title')
    Store Category
@endsection

@section('content')
    <div class="page-content page-home">
        <!-- ALl Categories -->
        <section class="store-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>All Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementCategory = 0 @endphp
                    @forelse ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2 m-auto" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
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
        <!-- All Product -->
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>All Products</h5>
                    </div>
                </div>
                <!-- Thumbnail product -->
                @php
                $incrementProduct = 0;
                @endphp
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="product-image" style="
                                        @if($product->galleries->count()) 
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else 
                                            background-color: #eee
                                        @endif                    
                                        ">
                                    </div>
                                </div>
                                <div class="product-text">{{ $product->name }}</div>
                                <div class="product-price">Rp {{ $product->price }}/kg</div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Products Found
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
