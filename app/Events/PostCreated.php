<?php

namespace App\Events;

use App\Post;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    public $user;

    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('new-post'),
            new PrivateChannel('App.User' . $this->post->user->id)
        ];
    }

    public function broadcastWith()
    {
        return [
            'post' => array_merge($this->post->toArray(),
                ['user' => $this->post->user,
                ]),
            'user' => $this->user,
        ];
    }
}
