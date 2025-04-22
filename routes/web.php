<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route for the welcome page
Route::get('/', function () {
    return view('tasks.index'); // Ensure you have an index.blade.php file in resources/views
});

// Resource routes for TaskController
Route::resource('tasks', TaskController::class);