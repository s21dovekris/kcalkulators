<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Import the Message model

class ContactController extends Controller
{
    // Pāradresācija uz skatu, kas atbild par ziņas izveidi autoram.

    public function create()
    {
        return view('contact.create');
    }

    /**
     * Funkcija, kas uzglabā ziņu, kas paredzēta autoram 
     * Nepieciešamie dati ar validāciju - vārds, epasts, ziņa
     * 
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->save();

        return redirect()->route('contact.create')->with('success', 'Paldies par ziņu!');
    }
}