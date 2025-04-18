<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/NameForm', function () {
    return view('serachName');
});

use App\Http\Controllers\NameController;                    // herer we till laravel when the user hit this route call this Controller

Route::post('/NameForm', [NameController::class, 'checkName']);




// php artisan serve -->> to start local server 