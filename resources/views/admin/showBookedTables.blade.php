@extends('admin.layouts.adminLayout')
<!-- Page Wrapper -->
@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.fixed.adminSideBar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.fixed.adminTopBar')
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Booked Tables</h1>
                    </div>
                </div>
                <form action="{{ route('filteredTable') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="filter" class="mr-2">Sortiraj po:</label>
                        <select name="filter" id="filter" class="form-control">
                            <option value="oldest_date">Najstariji datum</option>
                            <option value="newest_date">Najnoviji datum</option>
                            <option value="earliest_time">Najranije vreme</option>
                            <option value="latest_time">Najkasnije vreme</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtriraj</button>
                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col" >No. of People</th>
                        <th scope="col">Additional Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $r)
                        <tr>
                            <th scope="row">{{$r->id}}</th>
                            <td>{{$r->name}}</td>
                            <td>{{$r->phone}}</td>
                            <td>{{$r->date}}</td>
                            <td>{{$r->time}}</td>
                            <td>{{$r->peopleNumber}}</td>
                            @if($r->message === null)
                                <td>No additional notes </td>
                                @else
                                <td>{{$r->message}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection
