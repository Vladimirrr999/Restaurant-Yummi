@extends('layouts.layout')
@section('title') Menu Yummi @endsection

<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach($data['menuProducts'] as $m)
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="{{$m['bs-target']}}">
                        <h4>{{$m['name']}}</h4>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            @foreach($data['menuProducts'] as $m)
                <div class="tab-pane fade" id="{{ substr($m['bs-target'], 1) }}">
                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>{{$m['name']}}</h3>
                    </div>
                    <div class="row">
                        @foreach($data['products'] as $a)
                            @if($a->blockId === substr($m['bs-target'], 1))
                                <div class="col-lg-4 menu-item">
                                    <a href="{{$a->src}}" class="glightbox">
                                        <img src="{{$a->src}}" class="menu-img img-fluid" alt="{{$a->title}}">
                                    </a>
                                    <h4>{{$a->title}}</h4>
                                    <p class="ingredients">{{$a->ingredients}}</p>
                                    <p class="price">${{$a->price}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
