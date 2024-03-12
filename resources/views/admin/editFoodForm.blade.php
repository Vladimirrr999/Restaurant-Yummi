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
                        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
                    </div>
                    <!-- Blade template -->
                    <div id="errorMessages" class="alert alert-danger" style="display: none;"></div>
                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
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

                    <form action="{{route('updateProduct', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="width:50%;">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$product->title}}" id="title" placeholder="Title">
                        </div>
                        <div class="form-group" style="width:50%;">
                            <label for="ingredients">Ingredients</label>
                            <input type="text" class="form-control" name="ingredients" value="{{$product->ingredients }}" id="ingredients" placeholder="Lettuce, Tomato...">
                        </div>
                        <input type="file" class="form-control" name="img" id="img" style="width: 50%;">
                        @if ($product->src)
                            <p>Trenutna slika: <img src="{{ $product->src }}" alt="{{$product->src}}" width="50"></p>
                        @else
                            <p>Trenutno nema izabrane slike.</p>
                        @endif
                        <div class="form-group" style="width:50%;">
                            <label for="price">Price</label>
                            $:<input type="text" class="form-control" name="price" value="{{$product->price}}" id="price">
                        </div>
                        <div class="form-group" style="width: 50%">
                            <label for="ddl">Block</label>
                            <select id="ddl" name="ddl1" class="form-control">
                                <option value="0">Choose Block to show</option>
                                <option value="menu-starters" {{ $product->blockId == 'menu-starters' ? 'selected' : '' }}>Menu-Starters</option>
                                <option value="menu-breakfast" {{ $product->blockId == 'menu-breakfast' ? 'selected' : '' }}>Menu-Breakfast</option>
                                <option value="menu-lunch" {{ $product->blockId == 'menu-lunch' ? 'selected' : '' }}>Menu-Lunch</option>
                                <option value="menu-dinner" {{ $product->blockId == 'menu-dinner' ? 'selected' : '' }}>Menu-Dinner</option>
                            </select>
                        </div>

                        <div class="form-group" style="width: 50%">
                            <label for="ddl2">Category</label>
                            <select id="ddl2" name="ddl2" class="form-control">
                                <option value="0">Choose Category for Product</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection
