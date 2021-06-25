<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendEmailController;

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
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

/*
    We have grouped all routes so we can apply "auth:sanctum" and 
    "verified" middleware to all routes thereby restricting those pages to only verified, logged in users.

    We have modified route for dashboard, which will now pass request to 
    TaskController's Index function. And created routes for other actions.
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/list',[TasksController::class, 'index'])->name('list');
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/task',[TasksController::class, 'add']);
    Route::post('/task',[TasksController::class, 'create']);
    
    Route::get('/task/{task}', [TasksController::class, 'edit']);
    Route::post('/task/{task}', [TasksController::class, 'update']);
});

//Send email
Route::get('/send-email', [SendEmailController::class, 'index'])->name('send-email');
Route::get('/send-email',[SendEmailController::class, 'sendemail']);
Route::post('/send-email',[SendEmailController::class, 'saveToDb']);

// Managing Google accounts.
Route::name('google.index')->get('google', 'GoogleAccountController@index');
Route::name('google.store')->get('google/oauth', 'GoogleAccountController@store');
Route::name('google.destroy')->delete('google/{googleAccount}', 'GoogleAccountController@destroy');