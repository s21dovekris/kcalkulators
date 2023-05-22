<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recepte;
use Illuminate\Http\Request;

class RecepteController extends Controller
{
        public function index()
        {
            $recipes = Recepte::all();
            return view('receptes.index', compact('recipes'));
        }
    
        public function create()
        {
            return view('receptes.create');
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'guide' => 'required',
            ]);
    
            $recipe = Recepte::create($validatedData);
    
            // Add code to handle product associations and weights
    
            return redirect()->route('receptes.index')->with('success', 'Recipe created successfully!');
        }
    }
    

    
    