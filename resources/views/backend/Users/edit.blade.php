@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit User</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ url('admin/users') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>

            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">
            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form id="products" action="{{ route('admin.user.update', $user->id ) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                           value="{{ $product->title }}" />
                    @error('title')
                    <div class="invalid-feedback" > {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                           id="price"  value="{{ $product->price }}" />
                    @error('price')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">Upload Image</label>
                    <img class="form-control" src="{{ asset('products/'.$product->image) }}" alt="{{ $product->image }}"
                         width="100" />
                    <input type="file"
                           class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}" />
                    @error('image')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </main>
@endsection
