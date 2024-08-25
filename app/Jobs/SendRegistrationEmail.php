<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;
        
        Mail::send('emails.registration', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])
                    ->from("info@heyram.ca", 'Heyram')
                    ->subject("Welcome to Heyram Consultants CRM - Your Login Details");
        });
    }
}
