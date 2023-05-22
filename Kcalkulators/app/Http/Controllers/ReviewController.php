<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required',
        ]);

        // Create a new review in the database
        $review = Review::create($validatedData);

        // Redirect back to the create page with a success message
        return redirect()->route('reviews.create')->with('success', 'Review submitted successfully!');
    }
}