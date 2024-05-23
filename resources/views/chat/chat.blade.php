@extends('admin.layouts.app')
@section('page_css')
<style type="text/css">
    .chat-card {
        height: 500px;
    }
    .chat-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .chat-message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
    }
    .chat-message.sender {
        background-color: #d1e7dd;
        text-align: right;
    }
    .chat-message.receiver {
        background-color: #f8d7da;
        text-align: left;
    }
    .input-group {
        margin-top: 10px;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat with {{ $user->name }} {{ $user->last_name }}</div>

                    <div class="card-body chat-body">
                        <div class="chat-messages" id="chat-messages">
                            @foreach($messages as $message)
                                <div class="chat-message {{ $message->sender_id == auth()->id() ? 'sender' : 'receiver' }}">
                                    {{ $message->message }}
                                </div>
                            @endforeach
                        </div>

                        <div class="input-group">
                            <input type="text" name="message" id="type-message" class="form-control" placeholder="Type a message...">
                            <span class="input-group-btn">
                                <button class="send-message-btn btn btn-primary" id="message-send-button" data-receiver_id="{{ $user->id }}">Send</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var userId = '{{ Auth::user()->id }}';
    var pusherKey = '8414dd3b61896df45a78';
    var pusher = new Pusher(pusherKey, {
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = pusher.subscribe('private-webential-channel_{{$unique['uniqueid']}}');
    channel.bind('myMessages', function(data) {
        if(userId != data.senderId) {
            $("#chat-messages").append('<div class="chat-message receiver" id="main-chat-inner">'+data.message+'</div>');
        }

        /*if(userId == data.senderId) {
            $("#chat-messages").append('<div class="chat-message sender" id="main-chat-inner">'+data.message+'</div>');
        }*/
    });

    $(document).on('click', "#message-send-button", function(e){
        var msg = $("#type-message").val();
        if(msg && msg != "") {
            var rec_id = $(this).attr('data-receiver_id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('chat.send-message') }}",
                type: "POST",
                data: { message: msg, receiver_id: rec_id },
                dataType: 'json',
                success: function(response) {
                    if(response.status == "1") {
                        $("#type-message").val("");   
                        $("#chat-messages").append('<div class="chat-message sender" id="main-chat-inner">'+msg+'</div>');  
                    }
                }
            });
        }
    });

    $(document).on('keypress', "#type-message", function(e){
        if (e.keyCode === 13 && e.shiftKey) {
        } else if (e.keyCode === 13) {
            e.preventDefault();
            $(this).closest("#type-message").submit();
        }
    });

    $(document).ready(function(){
        $('#type-message').keypress(function(e){
            if(e.keyCode==13 && !e.shiftKey)
                $('#message-send-button').click();
        });
    });
</script>
@endsection