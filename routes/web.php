<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
// Resources Routes:
// index - Show all listings
// show - show single Listing
// create - show form to create new Listing
// store - Store new Listing
// edit - Show form to edit Listing
// update - Update Listing
// destroy - Delete listing

// All Listing
Route::get('/', [ListingController::class, 'index']);


// Show Create Job Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


// Store Listing Data this is a post request that calls the store method
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');


// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// Submit Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');


// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// Create New Users
Route::post('/users', [UserController::class, 'store']);


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// // testing the get method
// Route::get('/hello', function() {
//     return 'Hello World';
// });

// // Testing wildCards regEx
// Route::get('/post/{id}', function($id){
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');
