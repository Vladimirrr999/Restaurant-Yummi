<section id="why-us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>Why Choose Yummy?</h3>
                    <p>
                        Yummi restaurant is established in 2006th as the young owner chef decided to make intense tastes from all kind of foods around
                        the world. It started with great envision and courage, so now Yummi is one of the most popular restaurant in our area. It
                        servers interational dishes with slightly differential taste made by the greatest chefs that are working here. If you want
                        to dine well, even drink coffee or some juice, you should come and book table so you grab that bite of magic!
                    </p>
                    <div class="text-center">
                        <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- End Why Box -->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="row gy-4">

                    @foreach($blocks as $blok)
                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="{{ $blok['delayTime'] }}">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="{{ $blok['icon'] }}"></i>
                                <h4>{{ $blok['title'] }}</h4>
                                <p>{{ $blok['text'] }}</p>
                            </div>
                        </div><!-- End Icon Box -->
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section><!-- End Why Us Section -->
