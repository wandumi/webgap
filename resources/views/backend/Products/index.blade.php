@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-secondary">Add Product</button>
                </div>

            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ProductID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                </tr>
                @empty
                    <tr>No Products</tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </main>
@endsection
