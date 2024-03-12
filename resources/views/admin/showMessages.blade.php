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
                        <h1 class="h3 mb-0 text-gray-800">Messages from Users <span id="unreadMessagesCounter" class="badge badge-danger"></span></h1>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $m)
                        <tr id="message_{{$m->id}}" @if(isset($_COOKIE['readMessage_' . $m->id])) style="background-color: lightgreen;" @endif>
                            <th scope="row">{{$m->id}}</th>
                            <td>{{$m->name}}</td>
                            <td>{{$m->email}}</td>
                            <td>{{$m->subject}}</td>
                            <td>{{$m->message}}</td>
                            <td>
                                <button class="btn btn-success mark-as-read" data-message-id="{{$m->id}}">Mark as Read</button>
                                <button class="btn btn-danger delete-message" data-message-id="{{$m->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <script>
                    document.querySelectorAll('.mark-as-read').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var messageId = button.getAttribute('data-message-id');
                            var messageRow = document.getElementById('message_' + messageId);
                            messageRow.style.backgroundColor = 'lightgreen';
                            document.cookie = 'readMessage_' + messageId + '=true; expires=Fri, 31 Dec 9999 23:59:59 GMT';
                            updateUnreadMessagesCounter();
                        });
                    });

                    document.querySelectorAll('.delete-message').forEach(function(button) {
                        button.addEventListener('click', function() {
                            var messageId = button.getAttribute('data-message-id');
                            var messageRow = document.getElementById('message_' + messageId);
                            messageRow.remove();
                            document.cookie = 'readMessage_' + messageId + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT';
                            updateUnreadMessagesCounter();
                        });
                    });

                    function updateUnreadMessagesCounter() {
                        var unreadMessagesCount = document.querySelectorAll('tr[id^="message_"]:not([style*="lightgreen"])').length;
                        document.getElementById('unreadMessagesCounter').innerText = unreadMessagesCount > 0 ? unreadMessagesCount : '';
                        if (unreadMessagesCount > 0) {
                            document.getElementById('unreadMessagesCounter').classList.add('text-white');
                        } else {
                            document.getElementById('unreadMessagesCounter').classList.remove('text-white');
                        }
                    }
                    updateUnreadMessagesCounter();
                </script>

            </div>
            <!-- Footer -->
            @include('admin.fixed.adminFooter')
        </div>
    </div>
    @include('admin.adminLogout')
@endsection
