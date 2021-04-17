<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {

        $data['title'] = $event->user->name;
        Mail::send('emails.welcome_email', $data, function($message) use ($event) {
            $message->to($event->user->email, $event->user->name)
                    ->subject('Welcome '.$event->user->name.'!');
        });
    }
}
