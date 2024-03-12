<?php
 $gallery = [
     [
         'name' => 'Custom Parties',
         'price' => '99',
         'desc' => 'You can always book a party celebration at our place',
         'img' => 'assets/img/events-1.jpg'
     ],
     [
         'name' => 'Birthday Parties',
         'price' => '499',
         'desc' => 'Celebrate birthday parties with your loving ones',
         'img' => 'assets/img/events-2.jpg'
     ],
     [
         'name' => 'private parties',
         'price' => '700',
         'desc' => 'Check in our restaurant for private celebration',
         'img' => 'assets/img/events-3.jpg'
     ]
 ]
?>
@foreach($gallery as $g)
    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{$g['img']}})">
        <h3>{{$g['name']}}</h3>
        <div class="price align-self-start">${{$g['price']}}</div>
        <p class="description">
            {{$g['desc']}}
        </p>
    </div><!-- End Event item -->
@endforeach
