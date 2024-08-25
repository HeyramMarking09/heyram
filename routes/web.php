<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LmiaController as AdminLmiaController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\Employer\AuthController as EmployerAuthController;
use App\Http\Controllers\Employer\LmiaController;
use App\Http\Controllers\Employer\RetainerAgreementController;

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
        Route::get('company-documents', [CompanyInformationController::class , 'companyDocuments'])->name('company-documents');
        Route::post('create-company-docs', [CompanyInformationController::class , 'createCompanyDocs'])->name('create-company-docs');

        Route::get('apply-for-an-lmia',[LmiaController::class , 'index'])->name('apply-for-an-lmia');
        Route::get('lmia',[LmiaController::class , 'lmiaListShow'])->name('lmia.list');
        Route::post('lmia-form', [LmiaController::class , 'lmiaForm'])->name('lmia-form');
        Route::get('get-list-of-lmias',[LmiaController::class , 'getLmiaList'])->name('get-list-of-lmias');
        Route::get('lmia-detail/{id}', [LmiaController::class , 'lmiaDetail'])->name('lmia-detail');

    });
});

// Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login.form', [AuthController::class, 'loginForm'])->name('login.form');
    });

    // Authenticated Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
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

        // Deleted Request Routes
        Route::get('delete-request', [ManageUserController::class, 'deleteRequest'])->name('delete-request');
        Route::get('get-delete-request', [ManageUserController::class, 'getDeleteRequest'])->name('get-delete-request');
        Route::delete('permanent-delete-request', [ManageUserController::class, 'permanentDeleteRequest'])->name('permanent-delete-request');

        // LMIA Request Route
        Route::get('lmia-request', [AdminLmiaController::class , 'index'])->name('lmia-request');
        Route::get('get-list-of-lmias', [AdminLmiaController::class , 'getListOfLmias'])->name('get-list-of-lmias');
        Route::post('change-lmia-status', [AdminLmiaController::class , 'changeLmiaStatus'])->name('change-lmia-status');


    });
});
