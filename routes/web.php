<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavedNameController;
use App\Http\Controllers\ReservedWordController;


use Illuminate\Support\Facades\Route;       //Illuminate is a namespace that contains many useful classes created by Laravel.

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



// Dynamic FAQ page from Controller
Route::get('/faqs', [FaqController::class, 'publicIndex'])->name('faqs.public');





// Dashboard page
Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::get('/NameForm', function () {                       //show the check name page
    return view('searchName');
})->name('searchName');

// Handle name form submission
Route::post('/NameForm', [NameController::class, 'checkName']);




// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Users route for authenticated users
Route::get('/users', [UserController::class, 'index'])->middleware('auth');




// Reserved words and saved names routes with authentication and verification
Route::middleware(['auth', 'verified'])->group(function () {
    // Route for reserved words
    Route::get('/dashboard/names', [SavedNameController::class, 'list'])->name('dashboard.names');
    // Route for saved names
    Route::get('/dashboard/reserved', [ReservedWordController::class, 'list'])->name('dashboard.reserved');
    // Route foe delete names 
    Route::delete('/names/{id}', [SavedNameController::class, 'destroy'])->name('savedNames.delete');
    //Route for delete re
    Route::delete('/reserved/{id}', [ReservedWordController::class, 'destroy'])->name('ReservedWord.delete');

    // to go for adding form and store it 
    Route::get('dashboard/reservedWords/create', [ReservedWordController::class, 'create'])->name('reservedWords.create');
    Route::post('dashboard/reservedWords', [ReservedWordController::class, 'store'])->name('reservedWords.store');



    Route::get('/reservedWords/{id}/edit', [ReservedWordController::class, 'edit'])->name('reservedWords.edit');
    Route::put('/reservedWords/{id}', [ReservedWordController::class, 'update'])->name('reservedWords.update');

    //to edit names and reseverdwords
    Route::get('/names/{id}/edit', [SavedNameController::class, 'edit'])->name('SavedNames.edit');
    Route::put('/names/{id}', [SavedNameController::class, 'update'])->name('SavedNames.update');

    //shows all faq but for auth users 

    Route::get('/faq', [FaqController::class, 'index'])->name('faq.auth');




});


//this code mean all file bath will get (admin) before the file path 
//and (resource) automatically creates 7 standard routes 
// FaqController::class This is the controller that handles all those routes.
// this line of code complete all CRUD operations

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::resource('faq', FaqController::class); // Handles all CRUD (index, create, edit, etc.)

});









require __DIR__ . '/auth.php';







