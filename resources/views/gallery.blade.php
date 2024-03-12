@extends('layouts.layout')
@section('content')

    <section id="events" class="events">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
                <h2>Events</h2>
                <p>Share <span>Your Moments</span> In Our Restaurant</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @include('components.gallery')
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Events Section -->
    <section id="gallery" class="gallery section-bg">
        @include('components.gallery-pictures')
    </section><!-- End Gallery Section -->
@endsection
