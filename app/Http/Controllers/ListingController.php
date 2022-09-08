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
            'company' => 'required',
             'location' => 'required',
             'website' => 'required',
             'email' => ['required', 'email'],
             'tags' => 'required',
             'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo'
            )->store('logos', 'public');
        }

        //submiting it to the database
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created Successfully!');

    }

    //show edit form

    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }


    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }


     // Delete Listing
     public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    
}
