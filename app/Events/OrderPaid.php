<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPaid
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $order;


    /**
     * OrderPaid constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
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
