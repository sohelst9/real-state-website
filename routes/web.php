<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\AboutPageController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ForgotPassController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\AgentDashbaordController;
use App\Http\Controllers\Frontend\AgentPropertyController;
use App\Http\Controllers\Frontend\ForgotPasswordController as FrontendForgotPasswordController;
use App\Http\Controllers\Frontend\FrontAuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;



Auth::routes(['login' => false, 'register' => false]);
//-- frontend routes---

//Config cache clear
Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    dd("All clear!");
});

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/search', [FrontendController::class, 'search'])->name('front.search');
Route::get('/login', [FrontAuthController::class, 'login'])->name('login');
Route::post('/login', [FrontAuthController::class, 'login_store'])->name('login.store');
Route::get('/register', [FrontAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontAuthController::class, 'register_store'])->name('register.store');
Route::get('/verify', [FrontAuthController::class, 'verify'])->name('verify');
Route::post('/verify/code_match', [FrontAuthController::class, 'code_match'])->name('verify.match,code');

///---forgot password
Route::get('user/account-recovery', [FrontendForgotPasswordController::class, 'account_recovery'])->name('user.account.recovery');
Route::post('user/account-recovery', [FrontendForgotPasswordController::class, 'account_recovery_store'])->name('user.account.recovery.store');
Route::get('/otp', [FrontendForgotPasswordController::class, 'otp'])->name('otp');
Route::post('/otp-match', [FrontendForgotPasswordController::class, 'otp_match'])->name('otp.match');
Route::get('/new-password/{otp}', [FrontendForgotPasswordController::class, 'new_password'])->name('new.password');
Route::post('/new-password/store', [FrontendForgotPasswordController::class, 'new_password_store'])->name('new.password.store');

//--page --
Route::get('/page/property', [PageController::class, 'property'])->name('page.property');
Route::get('/page/agent', [PageController::class, 'agent'])->name('page.agent');
Route::get('/page/about', [PageController::class, 'about'])->name('page.about');
Route::get('/page/contact', [PageController::class, 'contact'])->name('page.contact');
Route::get('/page/details/{id}', [PageController::class, 'details'])->name('page.details.property');

Route::post('/page/contact/store', [PageController::class, 'contact_store'])->name('front.contact.store');

Route::post('/newsletter', [PageController::class, 'newsletter'])->name('newsletter');



Route::prefix('agent')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AgentDashbaordController::class, 'dashboard'])->name('dashboard');
    Route::post('/profile/update/{id}', [AgentDashbaordController::class, 'profile_update'])->name('agent.profile.update');
    Route::get('/password', [AgentDashbaordController::class, 'password'])->name('agent.password');
    Route::post('/password/update', [AgentDashbaordController::class, 'password_update'])->name('agent.password.update');
    //agent_property
    Route::get('/property', [AgentPropertyController::class, 'property'])->name('agent.property');
    Route::get('/property/add', [AgentPropertyController::class, 'property_add'])->name('agent.add.property');
    Route::post('/property/store', [AgentPropertyController::class, 'property_store'])->name('agent.store.property');
    Route::get('/property/edit/{id}', [AgentPropertyController::class, 'property_edit'])->name('agent.edit.property');
    Route::get('/galleryImage/{gallery_id}/delete', [AgentPropertyController::class, 'galleryImage_delete']);
    Route::post('/property/update/{id}', [AgentPropertyController::class, 'property_update'])->name('agent.update.property');
    Route::get('/property/delete/{id}', [AgentPropertyController::class, 'property_delete'])->name('agent.delete.property');
    Route::get('/property/show/{id}', [AgentPropertyController::class, 'property_show'])->name('property.show');
});

//--backend routes

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/login/store', [AdminAuthController::class, 'login_store'])->name('admin.login.store');

//---forgot Password--
Route::get('admin/password-recovery', [ForgotPassController::class, 'password_recovery'])->name('admin.account.recovery');
Route::post('admin/password-recovery', [ForgotPassController::class, 'password_recovery_store'])->name('admin.password.recovery.store');
Route::get('/admin/otp', [ForgotPassController::class, 'otp'])->name('admin.otp');
Route::post('/admin/otp_match', [ForgotPassController::class, 'otp_match'])->name('admin.otp.match');
Route::get('/admin/new-password/{otp}', [ForgotPassController::class, 'new_password'])->name('admin.new.password');
Route::post('/admin/new-password/store', [ForgotPassController::class, 'new_password_store'])->name('admin.new.password.store');


Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/register', [AdminAuthController::class, 'register'])->name('admin.register')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::post('/register/store', [AdminAuthController::class, 'register_store'])->name('admin.register.store')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/change-password', [AdminAuthController::class, 'change_password'])->name('admin.password.change');
    Route::post('/change-password', [AdminAuthController::class, 'change_password_update'])->name('admin.password.change.update');
    Route::get('/change-porfile', [AdminAuthController::class, 'change_profile'])->name('admin.profile.change');
    Route::post('/change-porfile/{id}', [AdminAuthController::class, 'change_profile_update'])->name('admin.profile.change.update');

    Route::get('/setting', [AdminAuthController::class, 'setting'])->name('admin.setting')->middleware('legalrole', 'managementrole');
    Route::post('/setting', [AdminAuthController::class, 'setting_change'])->name('setting.change')->middleware('legalrole', 'managementrole');
    //--show all property--
    Route::get('/property/create', [PropertyController::class, 'create'])->name('admin.property.create')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::post('/property/store', [PropertyController::class, 'store'])->name('admin.property.store')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/property', [PropertyController::class, 'index'])->name('admin.property')->middleware('editorRole');
    Route::get('/property/approved', [PropertyController::class, 'approved_property'])->name('admin.property.approved')->middleware('editorRole', 'legalrole', 'managementrole');
    Route::get('/property/show/{id}', [PropertyController::class, 'show'])->name('admin.property.view');
    Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('admin.property.edit');
    Route::get('/galleryImage/{gallery_id}/delete', [PropertyController::class, 'galleryImage_delete']);
    Route::post('/property/update/{id}', [PropertyController::class, 'update'])->name('admin.update.property');
    Route::get('/property/delete/{id}', [PropertyController::class, 'delete'])->name('admin.property.delete');

    Route::get('/property/change_status/{id}', [PropertyController::class, 'change_status'])->name('admin.property.status')->middleware('adminrole', 'editorRole');

    Route::get('/property/management_check/{id}', [PropertyController::class, 'management_check'])->name('admin.property.management_check')->middleware('adminrole', 'legalrole', 'editorRole');

    Route::get('/property/admin_check/{id}', [PropertyController::class, 'admin_check'])->name('admin.property.admin_check')->middleware('managementrole', 'legalrole', 'editorRole');

    //users
    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/users/delete/{id}', [DashboardController::class, 'delete_user'])->name('admin.user.delete')->middleware('legalrole', 'managementrole', 'editorRole');

    //--prpoperty_type
    Route::get('/property_type', [PropertyTypeController::class, 'prpoperty_type'])->name('admin.prpoperty_type')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/property_type/add', [PropertyTypeController::class, 'prpoperty_type_add'])->name('admin.prpoperty_type.add')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::post('/property_type/store', [PropertyTypeController::class, 'prpoperty_type_store'])->name('admin.prpoperty_type.store')->middleware('legalrole', 'managementrole', 'editorRole');

    //--City
    Route::get('/city', [CityController::class, 'city'])->name('admin.city')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/city/add', [CityController::class, 'city_add'])->name('admin.city.add')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::post('/city/store', [CityController::class, 'city_store'])->name('admin.city.store')->middleware('legalrole', 'managementrole', 'editorRole');

    //--about page
    Route::get('/about-page', [AboutPageController::class, 'about'])->name('admin.about')->middleware('legalrole', 'managementrole');
    Route::post('/about-page', [AboutPageController::class, 'about_change'])->name('admin.about.change')->middleware('legalrole', 'managementrole');

    //--contact message
    Route::get('/contact-message', [AboutPageController::class, 'contact_message'])->name('admin.contact')->middleware('legalrole', 'managementrole');
    Route::get('/newsletter', [AboutPageController::class, 'admin_newsletter'])->name('admin.newsletter')->middleware('legalrole', 'managementrole');

    //---administrator
    Route::get('/adminusers', [AdminUserController::class, 'index'])->name('admin.adminuser')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/adminusers/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.adminuser.edit')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::post('/adminusers/update/{id}', [AdminUserController::class, 'update'])->name('admin.adminuser.update')->middleware('legalrole', 'managementrole', 'editorRole');
    Route::get('/adminusers/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.adminuser.delete')->middleware('legalrole', 'managementrole', 'editorRole');

    //---role
    Route::get('/role', [RoleController::class, 'index'])->name('admin.role')->middleware('legalrole', 'managementrole', 'editorRole');
    // Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    // Route::post('/role/create', [RoleController::class, 'store'])->name('admin.role.store');



});
