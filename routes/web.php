<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;

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




Route::post('/chat', [ChatController::class, 'store']);





// Route::post('/botman', [BotManController::class, 'handle']);

// Route::get('/botman/tinker', [UserController::class, 'tinker']);
// // Route::get('/botman/chat', function () {
// //     return view('chat');
// });
