@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 160px; margin-bottom: 50px;">
        <div class="row justify-content-between gy-5">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                <h2 data-aos="fade-up">About me<br>Full-Stack Junior Developer - Software engineer</h2>
                <p data-aos="fade-up" style="margin-bottom: 150px;" data-aos-delay="100">My name is Vladimir Lobanov and i am the owner of this website and the only author.
                I enjoy coding and mastering my skills through making websites, and also debugging them. I do want to expertise in SQL databases
                and to keep my way to complete back-end developer. I am at 3rd year of Vocational studies at ICT, web development course.
                In my free time i love playing video games, watching entertaining videos and training. My passion is kickbox training.</br>
                <mark>Vladimir Lobanov</mark></br>
                <mark>Broj indeksa: <b>84/21</b></mark></p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <img src="{{asset('assets/img/author.jpg')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>
    </div>


@endsection
