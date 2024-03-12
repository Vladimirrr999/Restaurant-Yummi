@extends('layouts.layout')
@section('content')
<style>
    .about .about-img{
        min-height: 200px;
    }
</style>
    <section id="about" class="about" >
        <div class="container" data-aos="fade-up">
            <br><br><br><br><br>
            <div class="align-content-center" style="text-align: center;padding: 50px;">
                <h4>Log in to book a table!</h4>
            </div>
            <div class="row gy-4" style="flex-direction:column; flex-wrap: wrap; align-content: center;">
                <div class="col-lg-7 position-relative about-img" data-aos="fade-up" data-aos-delay="150">
                    <div class="call-us position-absolute" style="bottom:1%;position:relative;">
                        @if(session('error-msg'))
                            <div class="alert alert-danger">
                                <p>{{session('error-msg')}}</p>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                <p style="color:green;">{{session('success')}}</p>
                            </div>
                        @endif
                        <form action="{{route('loginUser')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6" style="width:100%;">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6" style="width:100%;">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top:20px;">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
@endsection
