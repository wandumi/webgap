@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ url('admin/products/create') }}" class="btn btn-sm btn-secondary">Add Product</a>
                </div>

            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">
            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ProductID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>R {{ $product->price }}</td>
                    <td>
                        <img class="form-control" src="{{ asset('products/'.$product->image) }}" alt="{{ $product->image }}"
                             width="50" />
                    </td>
                    <td>
                        <a href="{{ url('admin/products/'.$product->id.'/edit' ) }}" class="btn btn-sm mb-sm-2 btn-info">Edit</a>
                        <form id="delete-form-{{ $product->id }}" action="{{ url('admin/products', $product->id ) }}"
                              method="POST" style="display:none" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>

                        <a href="" onclick="
                            if(confirm('Are you sure you want to Delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $product->id }}').submit();
                            }else{
                                event.preventDefault();
                            }">

                            <span class="fa fa-trash btn btn-sm btn-danger">Delete</span>
                        </a>

                    </td>
                </tr>
                @empty
                    <tr>No Products</tr>
                @endforelse

                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </main>
@endsection
