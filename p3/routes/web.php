<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\TestController;

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

Route::get('/', [PageController::class, 'welcome']);
Route::get('/home', [EntryController::class, 'home']);
Route::post('/home', [EntryController::class, 'newEntry']);
Route::get('/new', [PageController::class, 'new']);
Route::get('/daily/{id}', [EntryController::class, 'daily']);
Route::get('/daily/{id}/edit', [EntryController::class, 'edit']);

use Illuminate\Support\Facades\App;

# Only enable the following development-specific routes if we’re *not* running the application in the `production` environment
if (!App::environment('production')) {
    Route::get('/test/login-as/{userId}', [TestController::class, 'loginAs']);
    Route::get('/test/refresh-database', [TestController::class, 'refreshDatabase']);

    # It’s a good idea to move the practice route into this if condition
    # so that our practice routes are not available on production
    Route::any('/practice/{n?}', [PracticeController::class, 'index']);
}