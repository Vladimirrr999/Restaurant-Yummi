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
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/resetPassword', [\App\Http\Controllers\AdminController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/newPassword', [\App\Http\Controllers\AdminController::class, 'newPassword'])->name('newPassword');
    Route::get('/showUsers', [\App\Http\Controllers\AdminController::class, 'showUsers'])->name('showUsers');
    Route::post('/showUsers', [\App\Http\Controllers\AdminController::class, 'storeUsers'])->name('storeUsers');
    Route::get('/deleteUser{id}', [\App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/editUser/{id}', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('editUser');
    Route::put('/editUser/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('updateUser');
    Route::get('/showMenu', [\App\Http\Controllers\AdminController::class, 'showMenu'])->name('showMenu');
    Route::get('/addNewProduct', [\App\Http\Controllers\AdminController::class, 'addNewProduct'])->name('addNewProduct');
    Route::post('/storeProduct', [\App\Http\Controllers\AdminController::class, 'storeProduct'])->name('storeProduct');
    Route::get('/deleteProduct/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/editProduct{id}', [\App\Http\Controllers\AdminController::class, 'showEditForm'])->name('editProduct');
    Route::put('/updateProduct/{id}', [\App\Http\Controllers\AdminController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/bookedTables', [\App\Http\Controllers\AdminController::class, 'showBookedTables'])->name('bookedTables');
    Route::get('/bookedTables/filter', [\App\Http\Controllers\AdminController::class, 'filterTable'])->name('filteredTable');
    Route::get('/showMessages', [\App\Http\Controllers\AdminController::class, 'showMessages'])->name('showMessages');
});
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::get('/bookTable', [\App\Http\Controllers\HomeController::class, 'showFormBookTable'])->name('bookTable');
Route::post('/bookTable', [\App\Http\Controllers\HomeController::class, 'bookTable'])->name('bookTable');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/message', [\App\Http\Controllers\ContactController::class, 'message'])->name('message');



