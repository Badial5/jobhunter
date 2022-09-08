<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    // public function index(){
        
    //     return view('listings.index', [
    //         // 'listings' => Listing::all()
    //         'listings' => Listing::latest()->filter
    //         (request(['tag', 'search']))->get()
    //     ]);
    // }

     // Show all listings
     public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }


    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            // 'listing' => Listing::find($id)
    
            'listing' => $listing
        ]);
    }


    //show create form

    public function create() {
        return view('listings.create');
    }


    //store listing data
    public function store(Request $request) {
        //validation

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings',
             'company')],
             'location' => 'required',
             'website' => 'required',
             'email' => ['required', 'email'],
             'tags' => 'required',
             'description' => 'required'
        ]);

        //submiting it to the database
        Listing::create($formFields);

        return redirect('/');
    }


    
}
