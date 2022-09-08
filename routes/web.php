<?php

use App\Http\Controllers\ListingController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Listing;


// Route::get('/', function() {
//     return view('home');
// });

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


// Route::get('/hello', function() {
//     return response('<h1>Hello World Calvin</h1>', 200)
//     ->header('Context-Type', 'text/plain')
//     ->header('foo', 'bar');
// });



// Route::get('/posts/{id}', function($id){
//     ddd($id);
//     return response('POST ' . $id);
    
// })->where('id', '[0-9]+');

//For all the Listing this one will run -Fectch all Listings
// All Listings
Route::get('/', [ListingController::class, 'index']);


//show create form
Route::get('/listings/create', [ListingController::class, 'create']);



//For single listing this one will run -Fetch Single Listing
// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//show Edit Form
Route::get('/listings/{listing}/edit', [
    ListingController::class, 'edit'
]);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

    
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);