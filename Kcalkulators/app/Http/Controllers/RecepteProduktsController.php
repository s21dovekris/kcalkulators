<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepte;
use App\Models\Produkt;

class RecepteProduktsController extends Controller
{
    public function addProdukt(Request $request, Recepte $recepte)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'produkt_id' => 'required|exists:produkts,id',
            'svars' => 'required|numeric|min:0',
        ]);

        // Add the product to the recipe with the specified weight
        $recepte->produkts()->attach($validatedData['produkt_id'], ['svars' => $validatedData['svars']]);

        // Redirect back to the recipe page or wherever you want
        return redirect()->route('receptes.show', $recepte->id)->with('success', 'Product added to recipe successfully!');
    }

    public function removeProdukt(Recepte $recepte, Produkt $produkt)
    {
        // Remove the product from the recipe
        $recepte->produkts()->detach($produkt);

        // Redirect back to the recipe page or wherever you want
        return redirect()->route('receptes.show', $recepte->id)->with('success', 'Product removed from recipe successfully!');
    }
}
