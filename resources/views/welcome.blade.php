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

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($products as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ $product->image }}" alt="{{ $product->title }}" />
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text">{{ $product->title }}</p>
                                        <div>R {{ $product->price }}</div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('shop') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                        <a href="{{ url('shop') }}" class="btn btn-sm btn-outline-secondary">Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
@endsection
