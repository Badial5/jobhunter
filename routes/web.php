<?php

use GuzzleHttp\Psr7\Request;
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




// Route::get('/hello', function() {
//     return response('<h1>Hello World Calvin</h1>', 200)
//     ->header('Context-Type', 'text/plain')
//     ->header('foo', 'bar');
// });



// Route::get('/posts/{id}', function($id){
//     ddd($id);
//     return response('POST ' . $id);
    
// })->where('id', '[0-9]+');


Route::get('/', function() {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing In Array One',
                'description' => 'One The problem was this message 
                404, Requested entity was not found because I 
                tried to deploy my subdomain to the hosting 
                server and the resource_id entity does not 
                exist in the file of .firebasesrc I added in 
                the targets filed the same ID of the firebase 
                hosting project ID and the problem has been 
                solved.'
            ],

            [
                'id' => 2,
                'title' => 'Listing In Array Two',
                'description' => 'TWO The problem was this message 
                404, Requested entity was not found because I 
                tried to deploy my subdomain to the hosting 
                server and the resource_id entity does not 
                exist in the file of .firebasesrc I added in 
                the targets filed the same ID of the firebase 
                hosting project ID and the problem has been 
                solved.'
            ]
        ]
    ]);
});

