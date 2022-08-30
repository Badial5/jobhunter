<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Listing;

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
Route::get('/listings', function() {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});


//For single listing this one will run -Fetch Single Listing
Route::get('/listings/{id}', function($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
