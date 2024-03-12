@extends('layouts.layout')

@section('content')
    <section id="about" class="about" style="padding:67px 0px">
        <div class="container" data-aos="fade-up">
            <br><br><br><br><br>
            <div class="align-content-center" style="text-align: center;">
                <h4>Register now and book table online!</h4>
            </div>
            <div class="row gy-4" style="flex-direction:column; flex-wrap: wrap; align-content: center;">
                <div class="col-lg-7 position-relative about-img" data-aos="fade-up" data-aos-delay="150">
                    <div class="call-us position-absolute" style="bottom:1%;">
                        <form action="{{route('registerUser')}}"  method="post">
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
                                <div class="form-group col-md-6" style="width:100%;">
                                    <label for="inputPassword4">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" id="inputPassword5" placeholder="Confirm password">
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
                            <button type="submit" class="btn btn-primary" style="margin-top:20px;">Register</button>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
@endsection
