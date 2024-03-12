@php
 $nizAdminBlokova = [
     [
        'title' => 'Registered Users',
        'icons' => 'fas fa-calendar fa-2x text-gray-300',
        'color' => 'text-primary'
     ],
     [
        'title' => 'Food Menu - Total Prices',
        'icons' => 'fas fa-dollar-sign fa-2x text-gray-300',
        'color' => 'text-success'
     ],
     [
        'title' => 'Messages',
        'icons' => 'fas fa-clipboard-list fa-2x text-gray-300',
        'color' => 'text-info'
     ],
     [
        'title' => 'Booking Tables',
        'icons' => 'fas fa-comments fa-2x text-gray-300',
        'color' => 'text-warning'
     ]
];
 @endphp
@foreach($nizAdminBlokova as $index => $n)
    @php
        $link = '';
        switch($index) {
            case 0:
                $link = route('showUsers');
                break;
            case 1:
                $link = route('showMenu');
                break;
            case 2:
                $link = route('showMessages');
                break;
            case 3:
                $link = route('bookedTables');
                break;
            default:
                $link = route('dashboard');
        }
    @endphp
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ $link }}" class="card border-left-primary shadow h-100 py-2 text-decoration-none">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold {{$n['color']}} text-uppercase mb-1">
                            {{$n['title']}}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if ($index === 0)
                                {{$registeredUsers}}
                            @elseif ($index === 1)
                                {{$totalPriceOfFood}}
                            @elseif ($index === 2)
                                {{$messages}}
                            @elseif ($index === 3)
                                {{$bookedTables}}
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="{{$n['icons']}}"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach


