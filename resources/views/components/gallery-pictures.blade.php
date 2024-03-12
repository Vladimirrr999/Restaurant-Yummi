<?php
 $pictures = ['assets/img/gallery/gallery-2.jpg','assets/img/gallery/gallery-3.jpg','assets/img/gallery/gallery-4.jpg',
             'assets/img/gallery/gallery-5.jpg','assets/img/gallery/gallery-6.jpg','assets/img/gallery/gallery-7.jpg',
             'assets/img/gallery/gallery-8.jpg'
             ];
?>

<div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>gallery</h2>
        <p>Check <span>Our Gallery</span></p>
    </div>

    <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
            @for($i =0;$i<count($pictures);$i++)
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{$pictures[$i]}}"><img src="{{$pictures[$i]}}" class="img-fluid" alt=""></a></div>
            @endfor
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
