<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <h1>Yummy<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @php
                    $isLoggedIn = \Illuminate\Support\Facades\Auth::check();
                @endphp
                @foreach($data['menu'] as $item)
                    @php
                        $generatedUrl = route($item->route);
                    @endphp
                    @if($generatedUrl == route('login') || $generatedUrl == route('register'))
                        @if(!$isLoggedIn)
                            <li><a href="{{ $generatedUrl }}" style="color:#ce1212;">{{ $item->name }}</a></li>
                        @endif
                    @elseif($generatedUrl == route('logout'))
                    @else
                        <li><a href="{{ $generatedUrl }}">{{ $item->name }}</a></li>
                    @endif
                @endforeach
                @if($isLoggedIn)
                        <?php $user = \Illuminate\Support\Facades\Auth::user() ?>
                    @if($user->role_id == '2')
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" style="color:darkred"><b>Dashboard</b></a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="get" id="logoutForm">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                {{ \Illuminate\Support\Facades\Auth::user()->fullName }} (Log out)
                            </a>
                        </form>
                    </li>
                @endif
            </ul>
        </nav><!-- .navbar -->
        <?php $user = \Illuminate\Support\Facades\Auth::user() ?>
         @if(!$user || $user->role_id == "1")
            <a class="btn-book-a-table" href="{{ route('bookTable') }}">Book a Table</a>
        @endif
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header><!-- End Header -->
