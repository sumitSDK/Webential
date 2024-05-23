<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notify
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    /*public $message;
    public $senderId;*/
    public $data;
    public $channel;
    public $event;
    public function __construct($data ,$channel , $event)
    {
        $this->data = $data;
        $this->channel = $channel;
        $this->event = $event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [$this->channel];
        /*$unique = Auth::user()->id;
        return ['private-webential-channel_'.$unique];*/
        // return new PrivateChannel('channel-name');
    }

    public function broadcastAs()
    {
        return $this->event;
        // return 'myMessages';
    }
}
