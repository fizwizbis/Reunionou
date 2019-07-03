<?php

namespace App\Events;

use App\Event;
use App\Message;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var User */
    public $user;
    /** @var Message */
    public $body;
    /** @var Event */
    private $event;

    /**
     * MessageSent constructor.
     * @param User $user
     * @param Message $body
     * @param Event $event
     */
    public function __construct(User $user, Message $body, Event $event)
    {
        $this->user = $user;
        $this->body = $body;
        $this->event = $event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.'.$this->event->id);
    }
}
