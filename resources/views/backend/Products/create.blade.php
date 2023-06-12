@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Product</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ url('admin/products') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>

            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">
            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form id="products" action="{{ url('admin/products') }}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title" />
                    @error('title')
                    <div class="invalid-feedback" > {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="price" aria-describedby="price" />
                    @error('price')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">Upload Image</label>
                    <input type="file" value=""
                           class="form-control " name="image" id="image" />
                    @error('image')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </main>
@endsection
