@extends('admin.layouts.adminLayout')
<!-- Page Wrapper -->
@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.fixed.adminSideBar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.fixed.adminTopBar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
                    </div>
                    <div class="container-lg">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-8"><h2>Users <b>Details</b></h2></div>
                                    </div>
                                    <form action="{{route('updateUser', ['id'=> $user->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="form-group col-md-6" style="width:100%;">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" name="fullName" value="{{$user->fullName}}" id="fullName" placeholder="Full-name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6" style="width:100%;">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="inputEmail4" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" name="address" id="inputAddress" value="{{$user->address}}" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6" style="width:100%;">
                                                <label for="inputCity">City</label>
                                                <input type="text" class="form-control" name="city" value="{{$user->city}}" id="inputCity">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection


