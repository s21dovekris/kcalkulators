<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Recepte;
use App\Enums\ProduktKategorijaEnum;

class ProduktController extends Controller
{
    //
    
    public function index() {
        $produkts = Produkt::all();

        return view('produkts.index', compact('produkts'));
    }


    public function showInfo($id)
    {
        $produkts = Produkt::find($id);

        if (!$produkts) {
        // Handle case when product is not found
        // For example, return a 404 page or redirect back
        return redirect()->back()->with('error', 'Product not found');
    }

    return view('produkts.info', compact('produkts'));
    }

    public function edit($id)
    {
    $produkts = Produkt::find($id);

    return view('produkts.edit', compact('produkts'));
    }

    public function update(Request $request, $id)
    {
    $produkts = Produkt::find($id);
    $produkts->update($request->all());

    return redirect()->route('produkts.info', $id)->with('success', 'Produkts rediģēts veiksmīgi!');
    }

    public function jaunsprodukts()
    {
        return view('produkts.jaunsprodukts', compact('produkts'));
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nosaukums' => 'required',
        // Add validation rules for other attributes
    ]);

    $produkts = Produkt::create($validatedData);

    return redirect()->route('produkts.info', $produkts->id)->with('success', 'Produkts pievienots veiksmīgi!');
    }

    
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $produkts = Produkt::where('nosaukums', 'LIKE', '%' . $searchTerm . '%')
        ->orWhere('kategorija', 'LIKE', '%' . $searchTerm . '%')
        ->get();
    
    return view('produkts.search_results', compact('produkts'));
    }

    public function searchForProduct(Request $request)
    {
        $search = $request->input('search');

        $products = Produkt::where('nosaukums', 'like', '%' . $search . '%')->get();

        return response()->json($products);
    }




}
