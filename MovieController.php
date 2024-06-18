<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function addMovie(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release' => 'required|date',
            'length' => 'required|integer',
            'description' => 'required|string',
            'mpaa_rating' => 'required|string|max:5',
            'genre' => 'required|array',
            'director' => 'required|array',
            'performer' => 'required|array',
            'language' => 'required|array',
        ]);

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

        return response()->json($movie, 201);
    }//
}
