<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

   public $liker;
   public $post;
    public function __construct(User $liker,Post $post)
    {
        $this->liker=$liker;
        $this->post=$post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.posts.post_liked')->subject('Someone liked post');
    }
}
