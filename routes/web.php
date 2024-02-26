<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AttendanceController;

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


Route::middleware([\App\Http\Middleware\AuthLocal::class])->group(function () {
    Route::get('/', [MainController::class, 'index'] ) ->name('home');
    Route::post('/logout', [AdminController::class, 'logout'] ) ->name('logout');

    Route::get('/home/userList/', [MainController::class, 'show_users'] ) ->name('home.user_list');
    Route::get('/home/userList/search', [MainController::class, 'search_users'] ) ->name('home.user_list.search');

    Route::get('/home/groupList', [MainController::class, 'show_groups'] ) ->name('home.group_list');
    Route::get('/home/groupList/search', [MainController::class, 'search_groups'] ) ->name('home.group_list.search');

    Route::get('/home/adminList/', [MainController::class, 'show_admins'] ) ->name('home.admin_list');
    Route::get('/home/adminList/search', [MainController::class, 'search_admins'] ) ->name('home.admin_list.search');

    Route::get('/home/createGroup', [GroupController::class, 'create'] ) ->name('create.group');
    Route::post('/home/createGroup', [GroupController::class, 'store'] ) ->name('store.group');

    Route::get('/home/createUser', [UserController::class, 'create'] ) ->name('create.user');
    Route::post('/home/createUser', [UserController::class, 'store'] ) ->name('store.user');

    Route::get('/home/sessionsList/', [MainController::class, 'show_sessions'] ) ->name('home.session_list');
    Route::get('/home/sessionsList/search', [MainController::class, 'search_sessions'] ) ->name('home.session_list.search');

    Route::get('/home/createSession', [SessionController::class, 'create'] ) ->name('create.session');
    Route::post('/home/createSession', [SessionController::class, 'store'] ) ->name('store.session');

    Route::get('/home/present', [AttendanceController::class, 'create'] ) ->name('create.present');
    Route::post('/home/present', [AttendanceController::class, 'store'] ) ->name('store.present');
});

Route::get('/login', [MainController::class, 'login'] ) ->name('login');
Route::post('/login', [AdminController::class, 'login'] ) ->name('login.check');

