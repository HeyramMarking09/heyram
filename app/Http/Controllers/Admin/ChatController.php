<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    protected $UserService;
    public function __construct(UserService $UserService)
    {   
        $this->UserService = $UserService;
    }
    public function index()
    {
        $users = $this->UserService->usersSearch();
        return view('Admin.chat', compact('users'));
    }
    public function sendMessage(Request $request)
    {

        if ($request->hasFile('audio_file')) {
            $audioFile = $request->file('audio_file');
            
            // Generate a unique file name
            $fileName = time() . '_' . $audioFile->getClientOriginalName();
            
            // Define the path where you want to store the audio file in the public folder
            $filePath = public_path('chat_audio');
    
            // Check if the directory exists, if not, create it
            if (!file_exists($filePath)) {
                mkdir($filePath, 0777, true);
            }
    
            // Move the file to the public/chat_audio folder
            $audioFile->move($filePath, $fileName);
    
            // Save the file path in the database as relative to the public folder
            $relativePath = 'chat_audio/' . $fileName;
        }else{
            $relativePath = null;
        }
        $data = [
            'sender_id' =>$request->sender_id,
            'receiver_id' =>$request->receiver_id,
            'audio' =>$relativePath,
            'message' =>$request->message??null,
        ];
        Chat::create($data);
        return ['status' => 'true'];
    }
    public function getMessages(Request $request)
    {
        $receiverId = $request->receiver_id;
        $senderId = Auth::user()->id; // Current user ID

        $messages = Chat::where(function($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }
}
