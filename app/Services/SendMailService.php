<?php

namespace App\Services;

use App\Jobs\SendRegistrationEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SendMailService
{
    public function sendMail(array $email)
    {
        try{
            $login_link = env('APP_URL').'/login';
            $data = [
                'name' => $email['name'],
                'email' => $email['email'],
                'password' => $email['password'],
                'login_link' => $login_link
            ];           
    
            SendRegistrationEmail::dispatch($data);
            return true;
        }catch(\Exception $exception){
            Log::error("Error in SendMailService.createUser() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }
}
