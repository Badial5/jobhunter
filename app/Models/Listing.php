<?php

namespace App\Models;


class Listing {
    public static function all() {
        return [
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
            ];
    }

    //Finding a single listing on Find method
    public static function find($id) {
        //first fetch all the listing
        $listings = self::all();

        //Loop through any of them
        foreach($listings as $listing) {
            if($listing['id'] == $id ) {
                return $listing;
            }
        }
    }

}