@extends('frontend.layouts.app')

@section('content')
    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Products</h1>
                    <p class="lead text-body-secondary">Seeded Product Data</p>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="margin-bottom: 30px;">
                    @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('products/'.$product->image) }}" alt="{{ $product->title }}" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text">{{ $product->title }}</p>
                                    <div>R {{ $product->price }}</div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('product', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <form action="{{ url('shop') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="productId" value="{{ $product->id }}" />
                                        <input type="submit" class="btn btn-sm btn-outline-secondary" value="Add Cart"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{ $products->links() }}
            </div>
        </div>

    </main>
@endsection
