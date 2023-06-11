@extends('backend.layouts.app')

@section('content')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Orders</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-secondary">Orders</button>
                    </div>

                </div>
            </div>

            <h2 class="mb-5"></h2>
            <div class="table-responsive small">

                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->first_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->complete }}</td>
                    </tr>
                    @empty
                        <p>No Orders</p>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </main>
@endsection
