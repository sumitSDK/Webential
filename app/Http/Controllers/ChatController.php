<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use Pusher;
use App\Events\Notify;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChat($id)
    {
        $user = User::findOrFail($id);
        $messages = Message::where(function($query) use ($id) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $id);
        })->orWhere(function($query) use ($id) {
            $query->where('sender_id', $id)->where('receiver_id', auth()->id());
        })->get();
        $unique['uniqueid'] = Auth::user()->id;
        return view('chat.chat', compact('user', 'messages', 'unique'));
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();
        $response['senderId'] = Auth::user()->id;
        $response['status'] = 1;
        $data = ['message'=>$request->message, 'senderId'=>Auth::user()->id];
        $options = array('cluster' => config('broadcasting.connections.pusher.options.cluster'),'encrypted' => true);
        $pusher = new Pusher( config('broadcasting.connections.pusher.key'), config('broadcasting.connections.pusher.secret'), config('broadcasting.connections.pusher.app_id'), $options );
         $pusher->trigger( 'private-webential-channel_'.$request->receiver_id, 'myMessages', $data);
        // event(new Notify($data,'private-webential-channel_'.Auth::user()->id,"myMessages"));
        return response()->json($response);
    }

    public function PusherAuthorization() {
        $options = array('cluster' => config('broadcasting.connections.pusher.options.cluster'),'encrypted' => true);
        $pusher = new Pusher(config('broadcasting.connections.pusher.key'), config('broadcasting.connections.pusher.secret'), config('broadcasting.connections.pusher.app_id'), $options);
        $unique = Auth::user()->id;
        if($_POST['channel_name'] == 'private-webential-channel_'.$unique){
            $presence_data = array('name' => Auth::user()->id.' '.Auth::user()->name);
            echo $pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], Auth::user()->id, $presence_data);
        }
        else{
            echo $pusher->socket_auth( $_POST['channel_name'] ,$_POST['socket_id']);
        }
    }
}