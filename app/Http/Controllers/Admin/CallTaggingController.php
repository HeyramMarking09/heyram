<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CallTaggingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class CallTaggingController extends Controller
{
    protected $CallTaggingService;
    public function __construct(CallTaggingService $CallTaggingService)
    {
        $this->CallTaggingService = $CallTaggingService;
    }
    public function index() {
        if (Gate::allows('access-permission', ['Call Tagging', 'view'])) {
            return view('Admin.call-tagging');
        }else{
            abort(403, 'Unauthorized action.');
        }
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
        if (Gate::allows('access-permission', ['Call Tagging', 'view'])) {
            $data = $this->CallTaggingService->detail($id);
            return view('Admin.call-tagging-detail', compact('data'));
        }else{
            abort(403, 'Unauthorized action.');
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
