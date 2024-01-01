<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

	Route::get('/task-management', [TaskController::class,'task'])->name('task');
	Route::get('/create-task', [TaskController::class,'create'])->name('create');
	Route::post('/insert-task', [TaskController::class,'restore'])->name('restore');
	Route::get('/delete-task/{id}', [TaskController::class,'deletetask'])->name('deletetask');
	Route::get('/edit-task/{id}', [TaskController::class,'edittask'])->name('edittask');
	Route::post('/update-task/{id}', [TaskController::class,'updatetask'])->name('updatetask');

	Route::get('/user-management', [UserController::class, 'user'])->name('user');
	Route::get('/user-management/create', [UserController::class, 'add'])->name('register');
	Route::post('/user-management/create', [UserController::class, 'store'])->name('register.perform');
	Route::get('/user-management/edit/{id}', [UserController::class, 'edit'])->name('edit');
	Route::put('/user-management/edit/{id}', [UserController::class, 'update'])->name('edit.perform');
	Route::post('/user-management/delete/{id}', [UserController::class, 'delete'])->name('delete');

	Route::get('/team-management', [TeamController::class, 'index'])->name('show.team');
	Route::get('/team-management/create', [TeamController::class, 'create'])->name('create.team');
	Route::post('/team-management/create', [TeamController::class, 'store'])->name('store.team');
	// Route::get('/team-management/edit/{id}', [TeamController::class, 'edit'])->name('edit');
	// Route::put('/team-management/edit/{id}', [TeamController::class, 'update'])->name('edit.perform');
	// Route::post('/team-management/delete/{id}', [TeamController::class, 'delete'])->name('delete');

	//punya hadyan
	Route::get('/projek', [ProjectController::class, 'index'])->name('projek');
	Route::get('/create-projek', [ProjectController::class, 'create'])->name('projek.create');
	Route::post('/store-projek', [ProjectController::class, 'store'])->name('projek.store');
	Route::get('/edit-projek/{id}', [ProjectController::class, 'edit'])->name('projek.edit');
	Route::post('/delete-projek/{id}', [ProjectController::class, 'delete'])->name('projek.delete');
	Route::post('/update-projek/{id}', [ProjectController::class, 'update'])->name('projek.update');

	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
