<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CallTaggingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CallTaggingController extends Controller
{
    protected $CallTaggingService;
    public function __construct(CallTaggingService $CallTaggingService)
    {
        $this->CallTaggingService = $CallTaggingService;
    }
    public function index() {
        return view('Admin.call-tagging');
    }
    public function create(Request $request)
    {
        try{
            return $this->CallTaggingService->create($request->all());
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController. create()'. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function getCallTaggingList(Request $request)
    {
        try{
            return $this->CallTaggingService->getCallTaggingList($request->all());
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController.getCallTaggingList()'. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function delete(Request $request)
    {
        try{
            return $this->CallTaggingService->delete($request->all());
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController.delete()'. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function addComment(Request $request)
    {
        try{
            return $this->CallTaggingService->addComment($request->all());
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController.addComment()'. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function detail($id)
    {   
        try{
            $data = $this->CallTaggingService->detail($id);
            Log::info($data);
            return view('Admin.call-tagging-detail', compact('data'));
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController.addComment()'. $th->getLine() .' '.$th->getMessage());
        }
    }
    public function update(Request $request)
    {
        try{
            return $this->CallTaggingService->update($request->all());
        }catch(\Exception $th){
            Log::error('Error in CallTaggingController.update()'. $th->getLine() .' '.$th->getMessage());
        }
    }
}
