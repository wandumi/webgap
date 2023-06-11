@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Links</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-secondary">Add Links</button>

                </div>

            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @forelse($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->user_id }}</td>
                        <td>{{ $link->code }}</td>
                        <td>{{ $link->created_at }}</td>
                        <td>{{ $link->updated_at }}</td>
                    </tr>
                @empty
                    <tr>No Orders</tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </main>
@endsection

