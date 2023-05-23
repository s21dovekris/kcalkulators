<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recepte;
use App\Models\Produkt;
use Illuminate\Http\Request;

class RecepteController extends Controller
{
        public function index()
        {
            $recipes = Recepte::all();
            return view('receptes.index', compact('recipes'));
        }
    
        public function showInfo($id)
        {
            $recipe = Recepte::findOrFail($id);
            $products = $recipe->produkts;

        return view('receptes.show', compact('recipe', 'products'));
        }

        public function create()
        {
            // Retrieve all the products
            $produkts = Produkt::all();

            // Pass the products to the view
            return view('receptes.create', compact('produkts'));
        }
    
        public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'guide' => 'required',
        'produkts' => 'required|array',
        'produkts.*.svars' => 'required|numeric|min:0',
    ]);

    // Create a new recipe in the database
    $recipe = Recepte::create([
        'nosaukums' => $validatedData['name'],
        'apraksts' => $validatedData['guide'],
    ]);

    // Add the products to the recipe with their weights
    foreach ($validatedData['produkts'] as $produktId => $produktData) {
    $recipe->produkts()->attach($produktId, ['svars' => $produktData['svars']]);
    }

    // Redirect to the recipe page or wherever you want
    return redirect()->route('receptes.show', $recipe->id)->with('success', 'Recipe created successfully!');
}


        public function search(Request $request)
        {
            $searchTerm = $request->input('search');
            $recipes = Recepte::where('nosaukums', 'LIKE', '%' . $searchTerm . '%')->orWhere('apraksts', 'LIKE', '%' . $searchTerm . '%')->get();

            return view('receptes.search_results', compact('recipes'));
        }

        public function edit($id)
        {
            // Fetch the recipe based on the provided ID
            $recipe = Recepte::findOrFail($id);

            // Fetch the products related to the recipe
            $products = $recipe->produkts()->get();

            // Pass the recipe and products data to the view
            return view('receptes.edit', compact('recipe', 'products'));
        }

        public function update(Request $request, $id)
        {
            // Retrieve the recipe by ID
            $recipe = Recepte::findOrFail($id);

            // Validate the request data
            $validatedData = $request->validate([
                'nosaukums' => 'required',
                'apraksts' => 'required',
            // Add validation rules for other fields if necessary
            ]);

            // Update the recipe with the validated data
            $recipe->update($validatedData);

            // Redirect to the recipe show page or perform any other necessary actions
            return redirect()->route('receptes.show', $recipe->id);
        }
        
        

}
    

    
    