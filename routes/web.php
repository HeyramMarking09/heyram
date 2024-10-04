<?php

use App\Http\Controllers\Admin\AdditionalDocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CallTaggingController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\JobBankController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LmiaController as AdminLmiaController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\Employee\AuthController as EmployeeAuthController;
use App\Http\Controllers\Employer\AuthController as EmployerAuthController;
use App\Http\Controllers\Employer\CompanyDocController;
use App\Http\Controllers\Employer\LmiaController;
use App\Http\Controllers\Employer\RetainerAgreementController;
use App\Http\Controllers\Employer\SupportController;
use App\Http\Controllers\FileDownloadController;

Route::get('/', function () {
    return view('welcome');
});

// Employer Routes
Route::namespace('Employer')->prefix('employer')->name('employer.')->group(function () {
    // Guest Routes
    Route::middleware('guest:employer')->group(function () {
        Route::get('login', [EmployerAuthController::class, 'login'])->name('login');
        Route::post('login.form', [EmployerAuthController::class, 'loginForm'])->name('login.form');
    });
    // Authenticated Routes
    Route::middleware('auth:employer')->group(function () {
        Route::get('dashboard', [EmployerAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('change-video-show-status', [EmployerAuthController::class, 'changeVideoShowStatus'])->name('change-video-show');
        Route::get('how-it-works', [EmployerAuthController::class, 'howItWorks'])->name('how-it-works');
        Route::get('retainer-agreement', [RetainerAgreementController::class, 'retainerAgreement'])->name('retainer-agreement');
        Route::post('create-retainer-agreement', [RetainerAgreementController::class, 'createRetainerAgreement'])->name('create-retainer-agreement');


        Route::get('logout', [EmployerAuthController::class, 'logout'])->name('logout');

        Route::get('profile', [EmployerAuthController::class , 'profile'])->name('profile');
        Route::get('change-password', [EmployerAuthController::class , 'changePassword'])->name('change-password');
        Route::post('change-password-form', [EmployerAuthController::class , 'changePasswordForm'])->name('change-password-form');

        Route::get('company-information', [CompanyInformationController::class , 'index'])->name('company-information');
        Route::post('create-company-information', [CompanyInformationController::class , 'createCompanyInformation'])->name('create-company-information');
        
        Route::get('company-documents', [CompanyDocController::class , 'index'])->name('company-documents');
        Route::post('create-company-docs', [CompanyDocController::class , 'create'])->name('create-company-docs');
        Route::get('download/company_docs/{file}', [CompanyDocController::class , 'download'])->name('download.company_docs');

        Route::get('apply-for-an-lmia',[LmiaController::class , 'index'])->name('apply-for-an-lmia');
        Route::get('lmia',[LmiaController::class , 'lmiaListShow'])->name('lmia.list');
        Route::post('lmia-form', [LmiaController::class , 'lmiaForm'])->name('lmia-form');
        Route::get('get-list-of-lmias',[LmiaController::class , 'getLmiaList'])->name('get-list-of-lmias');
        Route::get('lmia-detail/{id}', [LmiaController::class , 'lmiaDetail'])->name('lmia-detail');

        Route::get('job-bank', [LmiaController::class , 'jobBank'])->name('job-bank');
        Route::post('upload-additional-docs',[AdditionalDocumentController::class, 'uploadAdditionalDocs'])->name('upload-additional-docs');

        Route::get('support', [SupportController::class , 'index'])->name('support');
        Route::post('add-support', [SupportController::class , 'create'])->name('add-support');

    });
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login.form', [AuthController::class, 'loginForm'])->name('login.form');
    });

    // Authenticated Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('save-token', [AuthController::class, 'saveToken'])->name('save-token');
        Route::get('send-notification', [AuthController::class, 'sendNotification'])->name('send-notification');


        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        // Role and Permissions 
        Route::get('roles-permissions',[RoleController::class , 'index'] )->name('roles-permissions');
        Route::get('get-roles-permissions', [RoleController::class , 'getRolesPermissions'])->name('get-roles-permissions');
        Route::post('create-roles-permissions', [RoleController::class , 'createRoles'])->name('create-roles-permissions');
        Route::post('edit-roles-permissions', [RoleController::class , 'editRoles'])->name('edit-roles-permissions');
        
        // Permission 
        Route::get('permission/{id}',[PermissionController::class , 'index'] )->name('permission');
        Route::post('permissions/update', [PermissionController::class , 'permissionUpdate'])->name('permissions.update');



        // Other Admin Routes
        Route::get('manage-users', [ManageUserController::class, 'index'])->name('manage-users');
        Route::post('create-manage-user', [ManageUserController::class, 'createUser'])->name('manage.user.form');
        Route::get('get-manage-users', [ManageUserController::class, 'getManageUsers'])->name('get-manage-users');
        Route::delete('delete-manage-users', [ManageUserController::class, 'deleteUser'])->name('manage.user.delete');
        Route::post('update-manage-users', [ManageUserController::class, 'updateUser'])->name('update.manage.user');
        Route::post('assign-employee-form', [ManageUserController::class, 'assignEmployee'])->name('assign.employee.form');


        // Deleted Request Routes
        Route::get('delete-request', [ManageUserController::class, 'deleteRequest'])->name('delete-request');
        Route::get('get-delete-request', [ManageUserController::class, 'getDeleteRequest'])->name('get-delete-request');
        Route::delete('permanent-delete-request', [ManageUserController::class, 'permanentDeleteRequest'])->name('permanent-delete-request');
        Route::delete('recover-delete-request', [ManageUserController::class, 'recoverDeleteRequest'])->name('recover-delete-request');
        Route::get('get-users', [ManageUserController::class, 'getUsers'])->name('get-users');


        // LMIA Request Route
        Route::get('lmia-request', [AdminLmiaController::class , 'index'])->name('lmia-request');
        Route::get('lmia-detail/{id}', [AdminLmiaController::class , 'lmiaDetail'])->name('lmia-detail');
        Route::get('apply-for-an-lmia', [AdminLmiaController::class , 'applyForAnLmia'])->name('apply-for-an-lmia');
        Route::get('get-list-of-lmias', [AdminLmiaController::class , 'getListOfLmias'])->name('get-list-of-lmias');
        Route::post('change-lmia-status', [AdminLmiaController::class , 'changeLmiaStatus'])->name('change-lmia-status');
        Route::post('lmia-assign-employee', [AdminLmiaController::class , 'lmiaAssignEmployee'])->name('lmia-assign-employee');
        Route::post('lmia-approved', [AdminLmiaController::class , 'lmiaApproved'])->name('lmia-approved');
        Route::post('lmia-interview-schedule', [AdminLmiaController::class , 'lmiaInterviewSchedule'])->name('lmia-interview-schedule');
        Route::post('lmia-form', [AdminLmiaController::class , 'lmiaForm'])->name('lmia-form');

        // Lead Routes
        // leads
        Route::get('leads', [LeadController::class , 'index'])->name('leads');
        Route::post('create-lead', [LeadController::class , 'createLead'])->name('create-lead');
        Route::post('edit-lead', [LeadController::class , 'editLead'])->name('edit-lead');
        Route::get('get-leads', [LeadController::class , 'getAll'])->name('get-leads');
        Route::delete('lead-delete', [LeadController::class , 'deleteLead'])->name('lead-delete');
        Route::get('get-call-leads', [LeadController::class , 'getCallLeads'])->name('get-call-leads');

        // Employers List
        Route::get('employer-dashboard', [ManageUserController::class , 'employerDashboard'])->name('employer-dashboard');
        Route::get('employers', [ManageUserController::class , 'employers'])->name('employers');
        Route::get('employer-detail/{id}', [ManageUserController::class , 'employerDetail'])->name('employer-detail');

        // download pdf and csv file
        Route::get('download/file/{filename}', [FileDownloadController::class, 'download'])->name('download.file');
        Route::get('/download-file/{type}', [FileDownloadController::class, 'downloadFileCompanyInformation'])->name('download.dynamic');
        Route::get('/download-retainer_agreement/{type}', [FileDownloadController::class, 'downloadFileRetainerAgreement'])->name('download.retainer_agreement');

        // Job Bank Routes
        Route::post('create-job', [JobBankController::class , 'create'])->name('create-job');
        Route::delete('delete-bank-job', [JobBankController::class , 'deleteJob'])->name('delete-bank-job');
        Route::post('update-job', [JobBankController::class , 'update'])->name('update-job');

        // Additional Doc Routes
        Route::post('add-additional-docs',[AdditionalDocumentController::class, 'addAdditionalDocs'])->name('add-additional-docs');

        // Support Routes
        Route::get('support', [SupportController::class , 'getIndex'])->name('support');
        Route::post('add-answer', [SupportController::class , 'addAnswer'])->name('add-answer');

        // Call Tagging Routes
        Route::get('call-tagging', [CallTaggingController::class , 'index' ])->name('call-tagging');
        Route::post('create-call-tagging', [CallTaggingController::class , 'create' ])->name('create-call-tagging');
        Route::get('get-call-tagging-list', [CallTaggingController::class , 'getCallTaggingList' ])->name('get-call-tagging-list');
        Route::delete('delete-call-tagging', [CallTaggingController::class , 'delete' ])->name('delete-call-tagging');
        Route::post('add-comments', [CallTaggingController::class , 'addComment' ])->name('add-comments');
        Route::get('call-tagging-detail/{id}', [CallTaggingController::class , 'detail' ])->name('call-tagging-detail');
        Route::post('update-call-tagging', [CallTaggingController::class , 'update' ])->name('update-call-tagging');

        // Chats Routes
        Route::get('chat', [ChatController::class , 'index'])->name('chat');
        Route::post('send-message', [ChatController::class , 'sendMessage'])->name('send-message');
        Route::get('get-messages', [ChatController::class , 'getMessages'])->name('get-messages');

    });
});


// Admin Routes
Route::prefix('employee')->name('employee.')->group(function () {
    // Guest Routes
    Route::middleware('guest:employee')->group(function () {
        Route::get('login', [EmployeeAuthController::class, 'login'])->name('login');
        Route::post('login.form', [EmployeeAuthController::class, 'loginForm'])->name('login.form');
    });

    // Authenticated Routes
    Route::middleware('auth:employee')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [EmployeeAuthController::class, 'logout'])->name('logout');

        // Role and Permissions 
        Route::get('roles-permissions',[RoleController::class , 'index'] )->name('roles-permissions');
        Route::get('get-roles-permissions', [RoleController::class , 'getRolesPermissions'])->name('get-roles-permissions');
        Route::post('create-roles-permissions', [RoleController::class , 'createRoles'])->name('create-roles-permissions');
        Route::post('edit-roles-permissions', [RoleController::class , 'editRoles'])->name('edit-roles-permissions');
        
        // Permission 
        Route::get('permission/{id}',[PermissionController::class , 'index'] )->name('permission');
        Route::post('permissions/update', [PermissionController::class , 'permissionUpdate'])->name('permissions.update');



        // Other Admin Routes
        Route::get('manage-users', [ManageUserController::class, 'index'])->name('manage-users');
        Route::post('create-manage-user', [ManageUserController::class, 'createUser'])->name('manage.user.form');
        Route::get('get-manage-users', [ManageUserController::class, 'getManageUsers'])->name('get-manage-users');
        Route::delete('delete-manage-users', [ManageUserController::class, 'deleteUser'])->name('manage.user.delete');
        Route::post('update-manage-users', [ManageUserController::class, 'updateUser'])->name('update.manage.user');
        Route::post('assign-employee-form', [ManageUserController::class, 'assignEmployee'])->name('assign.employee.form');


        // Deleted Request Routes
        Route::get('delete-request', [ManageUserController::class, 'deleteRequest'])->name('delete-request');
        Route::get('get-delete-request', [ManageUserController::class, 'getDeleteRequest'])->name('get-delete-request');
        Route::delete('permanent-delete-request', [ManageUserController::class, 'permanentDeleteRequest'])->name('permanent-delete-request');
        Route::delete('recover-delete-request', [ManageUserController::class, 'recoverDeleteRequest'])->name('recover-delete-request');
        Route::get('get-users', [ManageUserController::class, 'getUsers'])->name('get-users');


        // LMIA Request Route
        Route::get('lmia-request', [AdminLmiaController::class , 'index'])->name('lmia-request');
        Route::get('lmia-detail/{id}', [AdminLmiaController::class , 'lmiaDetail'])->name('lmia-detail');
        Route::get('apply-for-an-lmia', [AdminLmiaController::class , 'applyForAnLmia'])->name('apply-for-an-lmia');
        Route::get('get-list-of-lmias', [AdminLmiaController::class , 'getListOfLmias'])->name('get-list-of-lmias');
        Route::post('change-lmia-status', [AdminLmiaController::class , 'changeLmiaStatus'])->name('change-lmia-status');
        Route::post('lmia-assign-employee', [AdminLmiaController::class , 'lmiaAssignEmployee'])->name('lmia-assign-employee');
        Route::post('lmia-approved', [AdminLmiaController::class , 'lmiaApproved'])->name('lmia-approved');
        Route::post('lmia-interview-schedule', [AdminLmiaController::class , 'lmiaInterviewSchedule'])->name('lmia-interview-schedule');
        Route::post('lmia-form', [AdminLmiaController::class , 'lmiaForm'])->name('lmia-form');

        // Lead Routes
        // leads
        Route::get('leads', [LeadController::class , 'index'])->name('leads');
        Route::post('create-lead', [LeadController::class , 'createLead'])->name('create-lead');
        Route::post('edit-lead', [LeadController::class , 'editLead'])->name('edit-lead');
        Route::get('get-leads', [LeadController::class , 'getAll'])->name('get-leads');
        Route::delete('lead-delete', [LeadController::class , 'deleteLead'])->name('lead-delete');
        Route::get('get-call-leads', [LeadController::class , 'getCallLeads'])->name('get-call-leads');

        // Employers List
        Route::get('employer-dashboard', [ManageUserController::class , 'employerDashboard'])->name('employer-dashboard');
        Route::get('employers', [ManageUserController::class , 'employers'])->name('employers');
        Route::get('employer-detail/{id}', [ManageUserController::class , 'employerDetail'])->name('employer-detail');

        // download pdf and csv file
        Route::get('download/file/{filename}', [FileDownloadController::class, 'download'])->name('download.file');
        Route::get('/download-file/{type}', [FileDownloadController::class, 'downloadFileCompanyInformation'])->name('download.dynamic');
        Route::get('/download-retainer_agreement/{type}', [FileDownloadController::class, 'downloadFileRetainerAgreement'])->name('download.retainer_agreement');

        // Job Bank Routes
        Route::post('create-job', [JobBankController::class , 'create'])->name('create-job');
        Route::delete('delete-bank-job', [JobBankController::class , 'deleteJob'])->name('delete-bank-job');
        Route::post('update-job', [JobBankController::class , 'update'])->name('update-job');

        // Additional Doc Routes
        Route::post('add-additional-docs',[AdditionalDocumentController::class, 'addAdditionalDocs'])->name('add-additional-docs');

        // Support Routes
        Route::get('support', [SupportController::class , 'getIndex'])->name('support');
        Route::post('add-answer', [SupportController::class , 'addAnswer'])->name('add-answer');

        // Call Tagging Routes
        Route::get('call-tagging', [CallTaggingController::class , 'index' ])->name('call-tagging');
        Route::post('create-call-tagging', [CallTaggingController::class , 'create' ])->name('create-call-tagging');
        Route::get('get-call-tagging-list', [CallTaggingController::class , 'getCallTaggingList' ])->name('get-call-tagging-list');
        Route::delete('delete-call-tagging', [CallTaggingController::class , 'delete' ])->name('delete-call-tagging');
        Route::post('add-comments', [CallTaggingController::class , 'addComment' ])->name('add-comments');
        Route::get('call-tagging-detail/{id}', [CallTaggingController::class , 'detail' ])->name('call-tagging-detail');
        Route::post('update-call-tagging', [CallTaggingController::class , 'update' ])->name('update-call-tagging');

        // Chats Routes
        Route::get('chat', [ChatController::class , 'index'])->name('chat');
        Route::post('send-message', [ChatController::class , 'sendMessage'])->name('send-message');
        Route::get('get-messages', [ChatController::class , 'getMessages'])->name('get-messages');

    });
});