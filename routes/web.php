<?php

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
});

