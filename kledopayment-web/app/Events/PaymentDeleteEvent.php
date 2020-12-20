<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentDeleteEvent implements ShouldBroadcastNow
{
    // public $payment_name;
    public $message;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        // $this->payment_name = $payment_name;
        $this->message = "ID $message will be removed";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['delete-payment-channel'];
    }

    public function broadcastAs()
    {
        return 'delete-payment-event';
    }

    public function broadcastWith()
    {
        // This must always be an array. Since it will be parsed with json_encode()
        return [
            'name' => 'delete payment',
            'message' => $this->message,
        ];
    }
}
