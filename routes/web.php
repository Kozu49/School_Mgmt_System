<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//Logout Route
Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');


//User Management Route
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'ViewUser'])->name('user.view');
    Route::get('/add',[UserController::class,'AddUser'])->name('users.add');
    Route::post('/store',[UserController::class,'StoreUser'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class,'EditUser'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UpdateUser'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class,'DeleteUser'])->name('users.delete');

});

//Profile Management Route
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ViewProfile'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'EditProfile'])->name('profile.edit');
    Route::post('/update/{id}',[ProfileController::class,'UpdateProfile'])->name('profile.update');
    Route::get('/password/update',[ProfileController::class,'EditPassword'])->name('password.edit');
    Route::post('/password/update/{id}',[ProfileController::class,'UpdatePassword'])->name('password.update');






});
