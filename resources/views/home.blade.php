@extends('layouts.layout')
@section('title') Yummi Home @endsection
@section('description') Home Page of Yummi Restaurant @endsection
@section('keywords') Home,Restaurant,Food,Menu,Breakfast,Dinner,Lunch,Salads @endsection
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
    @include('components.hero-section')
    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= About Section ======= -->
        @include('components.about-us')

        <!-- ======= Why Us Section ======= -->
        @include('components.choose-us-blocks')

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
            <div class="container" data-aos="zoom-out">
                <div class="row gy-4">
                    @foreach($data['counter'] as $c)
                        <x-counter-stats :pureCounter="$c['statCounter']" :title="$c['title']" />
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            @include('components.testimonials')
        </section><!-- End Testimonials Section -->

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Chefs</h2>
                    <p>Our <span>Proffesional</span> Chefs</p>
                </div>
                <div class="row gy-4">
                @include('components.chefs')
                </div>

            </div>
        </section><!-- End Chefs Section -->
    </main><!-- End #main -->


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

@endsection
