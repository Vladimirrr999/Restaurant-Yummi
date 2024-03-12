<div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Testimonials</h2>
        <p>What Are They <span>Saying About Us</span></p>
    </div>

    <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
            @foreach($data['testimonials'] as $t)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        {{$t['quotation']}}
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>{{$t['name']}}</h3>
                                    <h4>{{$t['role']}}</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{$t['img']}}" class="img-fluid testimonial-img" alt="{{$t['name']}}">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
