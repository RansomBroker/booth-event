<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->name('user.')->group(function () {
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login/auth', 'auth')->name('login.process');
    Route::get('/register', 'registerView')->name('register.view');
    Route::post('/register/add', 'register')->name('register.add');
    Route::get('/admin/login', 'loginAdminView')->name('login.admin.view');
    Route::post('/admin/login/auth', 'adminAuth')->name('login.admin.process');
    Route::get('/forgot-password', 'forgotPasswordView')->name('forgot.password.view');
    Route::post('/forgot-password/reset', 'resetPassword')->name('forgot.password.reset.process');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/admin/logout', 'logoutAdmin')->name('admin.logout');
});

Route::controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/admin' ,'dashboard')->name('dashboard');
    Route::get('/admin/booth', 'boothView')->name('booth.view');
    Route::get('/admin/booth/add', 'boothAddView')->name('booth.add.view');
    Route::post('/admin/boot/add/process', 'boothAdd' )->name('booth.add');
    Route::get('/admin/both/edit/{booth}', 'boothEditView')->name('booth.edit.view');
    Route::patch('/admin/booth/edit/process/{booth}', 'boothEdit')->name('booth.edit');
    Route::delete('/admin/booth/delete/{booth}', 'boothDelete')->name('booth.delete');
});

