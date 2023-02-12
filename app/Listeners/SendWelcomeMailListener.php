<?php

namespace App\Listeners;

use App\Events\NewCustomerCreatedEvent;
use App\Mail\CustomerCreateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMailListener
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
     * @param  \App\Events\NewCustomerCreatedEvent  $event
     * @return void
     */
    public function handle(NewCustomerCreatedEvent $event)
    {
        Mail::to($event->customer->email)->send(new CustomerCreateMail($event->customer));
    }
}
