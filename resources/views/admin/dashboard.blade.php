@extends('admin.layouts.adminLayout')
<!-- Page Wrapper -->
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.fixed.adminSideBar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.fixed.adminTopBar')
            <!-- End of Topbar -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                <div class="row">
                    @include('components.admin-blocks')
                </div>

                <!-- Content Row -->
                @include('admin.progressBar')
            </div>
        </div>

        <!-- Footer -->
        @include('admin.fixed.adminFooter')
    </div>
</div>
@include('admin.adminLogout')
@endsection
