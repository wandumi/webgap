@extends('backend.layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ url('admin/products/users') }}" class="btn btn-sm btn-secondary">Add Users</a>
                </div>
            </div>
        </div>

        <h2 class="mb-5"></h2>
        <div class="table-responsive small">

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ProductID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>

                        <td>
                            <a class="btn btn-sm btn-secondary">View</a>
                            <a class="btn btn-sm btn-info">Edit</a>
                            <a class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>No Users</tr>
                @endforelse

                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </main>
@endsection
