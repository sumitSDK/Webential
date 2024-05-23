@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users List</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <table class="table" id="user-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_no }}</td>
                                        <td>
                                            @php
                                                $outgoingRequest = App\Models\Request::where('sender_id', Auth::id())
                                                    ->where('receiver_id', $user->id)
                                                    ->first();

                                                $incomingRequest = App\Models\Request::where('sender_id', $user->id)
                                                    ->where('receiver_id', Auth::id())
                                                    ->first();
                                            @endphp

                                            @if ($outgoingRequest)
                                                @if ($outgoingRequest->status == 'pending')
                                                    <button class="btn btn-secondary" disabled>Request Sent</button>
                                                @elseif ($outgoingRequest->status == 'accepted')
                                                    <a href="{{ route('chat', $user->id) }}" class="btn btn-success">Chat</a>
                                                @endif
                                            @elseif ($incomingRequest)
                                                @if ($incomingRequest->status == 'pending')
                                                    <form action="{{ route('requests.accept', $incomingRequest->id) }}" method="POST" style="margin-top: 10px;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Accept Request</button>
                                                    </form>
                                                @elseif ($incomingRequest->status == 'accepted')
                                                    <a href="{{ route('chat', $incomingRequest->sender_id) }}" class="btn btn-success" style="margin-top: 10px;">Chat</a>
                                                @endif
                                            @else
                                                <form action="{{ route('user.request', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Request</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        let table = $('#user-table').DataTable();
    });
</script>