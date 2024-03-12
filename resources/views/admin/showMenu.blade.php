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
                        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
                        <a href="{{route('addNewProduct')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Recipe name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Ingredients</th>
                        <th scope="col">Price</th>
                        <th scope="col" >blockId</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($food as $f)
                        <tr>
                            <th scope="row">{{$f->id}}</th>
                            <td>{{$f->title}}</td>
                            <td><img src="{{$f->src}}" alt="{{$f->src}}" width="50" height="50"></td>
                            <td>{{$f->ingredients}}</td>
                            <td>{{$f->price}}</td>
                            <td>{{$f->blockId}}</td>
                            <td>{{$f->categories->name}}</td>
                            <td>
                                <a class="edit btn btn-warning" title="Edit" data-toggle="tooltip" href="{{ route('editProduct', ['id' => $f->id]) }}">Edit</a>
                                <a href="{{ route('deleteProduct', $f->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection
