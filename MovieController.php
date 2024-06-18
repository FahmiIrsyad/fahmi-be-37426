<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function addMovie(Request $request)
    {
        
        $movie = new Movie([
            'title' => $request->title,
            'release' => $request->release,
            'length' => $request->length,
            'description' => $request->description,
            'mpaa_rating' => $request->mpaa_rating,
            'genre' => json_encode($request->genre),
            'director' => json_encode($request->director),
            'performer' => json_encode($request->performer),
            'language' => json_encode($request->language),
        ]);

        $movie->save();

        return response()->json([
            'message' => "Successfully added movie {$movie->title} with Movie_ID {$movie->id}",
            'success' => true
        ], 201);
    }//
}

