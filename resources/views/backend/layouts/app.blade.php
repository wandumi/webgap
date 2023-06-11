@include('backend.layouts.includes.topHeader')

@include('backend.layouts.includes.header')

<div class="container-fluid">
    <div class="row">
        <!-- Content Header (Page header) -->
        @include('backend.layouts.includes.sidebar')
        <!-- /.content-header -->

        @yield('content')

    </div>
</div>

@include('backend.layouts.includes.footer')
