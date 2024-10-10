<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UpdateService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    protected $UserService;
    protected $UpdateService;
    public function __construct(UserService $UserService, UpdateService $UpdateService)
    {
        $this->UserService = $UserService;
        $this->UpdateService = $UpdateService;
    }
    public function index()
    {
        $clients = $this->UserService->getClients();
        return view('Admin.Updates.index', compact('clients'));
    }
    public function create(Request $request)
    {
        return $this->UpdateService->create($request->all());
    }
    public function getAll(Request $request)
    {
        return $this->UpdateService->getAll($request->all());
    }
    public function delete(Request $request)
    {
        return $this->UpdateService->delete($request->all());
    }
    public function update(Request $request)
    {
        return $this->UpdateService->update($request->all());
    }
}
