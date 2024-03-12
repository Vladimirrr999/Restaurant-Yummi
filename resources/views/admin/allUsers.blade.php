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
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    </div>
                    @include('admin.allUsersIncludes.head')
                    <div class="container-lg">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-8"><h2>Users <b>Details</b></h2></div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="addUserForm" action="{{route('storeUsers')}}"  method="post">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" style="width:100%;">
                                                                <label for="fullName">Full Name</label>
                                                                <input type="text" class="form-control" name="fullName" value="{{old('fullName')}}" id="fullName" placeholder="Full-name">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" style="width:100%;">
                                                                <label for="inputEmail4">Email</label>
                                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" id="inputEmail4" placeholder="Email">
                                                            </div>
                                                            <div class="form-group col-md-6" style="width:100%;">
                                                                <label for="inputPassword4">Password</label>
                                                                <input type="password" class="form-control" name="password" value="{{old('password')}}" id="inputPassword4" placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress">Address</label>
                                                            <input type="text" class="form-control" name="address" id="inputAddress" value="{{old('address')}}" placeholder="1234 Main St">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" style="width:100%;">
                                                                <label for="inputCity">City</label>
                                                                <input type="text" class="form-control" name="city" value="{{old('city')}}" id="inputCity">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        </div>
                                                    </form>
                                                    <div class="alert alert-success" style="display: none;" id="successMessage">
                                                        User added successfully!
                                                    </div>
                                                    <div class="alert alert-danger" style="display: none;" id="errorMessage">
                                                        Error: Please check your inputs and try again.
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="addUserButton">Add User</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="usersTable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allUsers as $a)
                                            <tr>
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->fullName}}</td>
                                                <td>{{$a->email}}</td>
                                                <td>{{$a->address}}</td>
                                                <td>{{$a->city}}</td>
                                                <td>
                                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip" href="{{route('editUser', ['id'=>$a->id])}}"><i class="material-icons">&#xE254;</i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip" href="{{route('deleteUser', ['id' => $a->id])}}" onclick="return confirm('Do you want to delete user?')"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
<div class="alert alert-success" id="successMessage" style="display: none; position: fixed; bottom: 20px; right: 20px;">
    User added successfully!
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-new').click(function() {
            $('#addUserModal').modal('show');
        });
        $('#addUserButton').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route("storeUsers") }}',
                type: 'POST',
                data: $('#addUserForm').serialize(),
                dataType: 'json',
                success: function(response){
                    $('#addUserModal').modal('hide');
                    $('#addUserForm')[0].reset();

                    $('#addUserModal .modal-body').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#addUserModal').modal('show');
                    $('#successMessage').show();
                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 3000);
                    $('#usersTable').load(location.href + ' #usersTable');
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    var errorString = '<div class="alert alert-danger">';
                    $.each(errors, function (key, value) {
                        errorString += value + '<br>';
                    });

                    errorString += '</div>';
                    $('#errorMessage').html(errorString);
                    $('#errorMessage').show();
                    $('#successMessage').hide();
                }
            });
        });
    });
</script>
