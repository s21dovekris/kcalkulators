<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        Mail::to('beast1896@gmail.com')->send(new ContactMe($validatedData));

        // Redirect the user to a confirmation page or display a success message
        return redirect()->route('contact.create')->with('success', 'Your message has been sent. Thank you for contacting us!');
    }
}