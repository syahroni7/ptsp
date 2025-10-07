<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Log;

class DispositionProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pelayanan;
    public $recipient;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Models\DaftarPelayanan $pelayanan, \App\Models\User $recipient)
    {
        $this->pelayanan = $pelayanan;
        $this->recipient = $recipient;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
