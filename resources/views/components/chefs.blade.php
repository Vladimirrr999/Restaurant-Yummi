
@foreach($data['chefs'] as $n)
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{$n['delay']}}">
        <div class="chef-member">
            <div class="member-img">
                <img src="{{asset('assets/img/chefs/')}}/{{$n['img']}}" class="img-fluid" alt="{{$n['name']}}">
                <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="member-info">
                <h4>{{$n['name']}}</h4>
                <span>{{$n['jobDesc']}}</span>
                <p>{{$n['about']}}</p>
            </div>
        </div>
    </div><!-- End Chefs Member -->
@endforeach
