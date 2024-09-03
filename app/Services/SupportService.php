<?php

namespace App\Services;

use App\Jobs\SendRegistrationEmail;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SupportService
{
    public function create(array $data)
    {
        try{
            $dataUse = [
                'description' => $data['description'],
                'employer_id' => Auth::user()->id,
            ];
            $create = Support::create($dataUse);
            if(isset($create))
            {
                return ['status'=>true, 'message'=>'Support Created Successfully!'];
            }
            return ['status'=>false, 'message'=>'Somthing went wrong!'];
        }catch(\Exception $exception){
            Log::error("Error in SupportService.create() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }
    public function getALL()
    {
        try{
            return Support::where('employer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }catch(\Exception $exception){
            Log::error("Error in SupportService.create() ". $exception->getLine() .' '.$exception->getMessage());
        }        
    }
    public function getALLForAdmin()
    {
        try{
            return Support::orderBy('id', 'desc')->get();
        }catch(\Exception $exception){
            Log::error("Error in SupportService.getALLForAdmin() ". $exception->getLine() .' '.$exception->getMessage());
        }        
    }
    public function addAnswer(array $data)
    {
        try{
            $dataUse = [
                'answer' => $data['answer'],
            ];
            $create = Support::where('id', $data['id'])->first();
            if(isset($create))
            {
                $create->update($dataUse);
                return ['status'=>true, 'message'=>'Answered!'];
            }
            return ['status'=>false, 'message'=>'Somthing went wrong!'];
        }catch(\Exception $exception){
            Log::error("Error in SupportService.create() ". $exception->getLine() .' '.$exception->getMessage());
        }
    }
}
