<?php

namespace App\Listeners;

// use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this line
use App\Models\User;



class SendWelcomeEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Log::info('Sending welcome email to user: ' . $event->user->email);
        Mail::raw("Welcome {$event->user->name}!", function($message) use ($event) {
            $message->to($event->user->email)
                    ->subject("Welcome to Our App");
        });
    }
}
