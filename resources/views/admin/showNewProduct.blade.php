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
                        <h1 class="h3 mb-0 text-gray-800">Add new product</h1>
                    </div>
                    <!-- Blade template -->
                    <div id="errorMessages" class="alert alert-danger" style="display: none;"></div>
                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                    <form id="addProductForm" action="{{route('storeProduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="width:50%;">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Title">
                        </div>
                        <div class="form-group" style="width:50%;">
                            <label for="ingredients">Ingredients</label>
                            <input type="text" class="form-control" name="ingredients" value="{{ old('ingredients') }}" id="ingredients" placeholder="Lettuce, Tomato...">
                        </div>
                        <div class="form-group" style="width:50%;">
                            <label for="img">Image</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="form-group" style="width:50%;">
                            <label for="price">Price</label>
                            $:<input type="text" class="form-control" name="price" value="{{ old('price') }}" id="price">
                        </div>
                        <div class="form-group" style="width: 50%">
                            <label for="ddl">Block</label>
                            <select id="ddl" name="blokDodavanja" class="form-control">
                                <option value="0">Choose Block to show</option>
                                <option value="menu-starters">Menu-Starters</option>
                                <option value="menu-breakfast">Menu-Breakfast</option>
                                <option value="menu-lunch">Menu-Lunch</option>
                                <option value="menu-dinner">Menu-Dinner</option>
                            </select>
                        </div>
                        <div class="form-group" style="width: 50%">
                            <select id="ddl2" name="Kategorija" class="form-control">
                                <option value="0">Choose Category for Product</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#addProductForm').submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('storeProduct') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    $('#successMessage').html('<div class="alert alert-success">Product added successfully!</div>').show();
                    $('#errorMessages').hide();
                    window.location.href = "{{ route('showMenu') }}";

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '<ul>';
                    $.each(errors, function(key, value){
                        errorMessage += '<li>' + value + '</li>';
                    });
                    errorMessage += '</ul>';

                    $('#errorMessages').html('<div class="alert alert-danger">' + errorMessage + '</div>').show();
                    $('#successMessage').hide();
                }
            });
        });
    });
</script>
