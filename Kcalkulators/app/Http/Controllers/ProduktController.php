<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Recepte;
use App\Enums\ProduktKategorijaEnum;

class ProduktController extends Controller
{
    
    /**
     * Pāradresācijas funkcija uz /produkts sadaļu.
     */
    public function index() {
        $produkts = Produkt::all();

        return view('produkts.index', compact('produkts'));
    }
    
    /**
     * Pāradresācija uz produkta pievienošanas lapu.
     */
    public function create()
    {
        return view('produkts.create');
    }

    /**
     * Produkta pievienošanas glabāšanas funkcija ar validāciju pirms produkta pievienošanas.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nosaukums' => 'required',
        ]);

        $produkts = Produkt::create($validatedData);

        return redirect()->route('produkts.info', $produkts->id)->with('success', 'Produkts pievienots veiksmīgi!');
    }

    /**
     * Produkta apskatīšana izmantojot padoto mainīgo - produkta id.
     */
    public function showInfo($id)
    {
        $produkts = Produkt::find($id);

        if (!$produkts) {

        return redirect()->back()->with('error', 'Produkts nav atrasts!');
        }

        return view('produkts.info', compact('produkts'));
    }

    /**
     * Pāradresācijas funkcija uz produkta izmainīšanu, izmantojot padoto mainīgo - produkta id.
     */
    public function edit($id)
    {
        $produkts = Produkt::find($id);

        return view('produkts.edit', compact('produkts'));
    }

    /**
     * Produkta izmainīšanas funkcija izmantojot padotos - pieeju formai izmantojot Request $request un produkta id
     */
    public function update(Request $request, $id)
    {
        $produkts = Produkt::find($id);
        $produkts->update($request->all());

        return redirect()->route('produkts.info', $id)->with('success', 'Produkts rediģēts veiksmīgi!');
    }

    /**
     * Produkta dzēšanas funkcija izmantojot padoto produkta id
     */
    public function delete($id)
    {
        $produkts = Produkt::find($id);

        if (!$produkts) {
            return redirect()->back()->with('error', 'Produkts nav atrasts!');
        }

        $produkts->delete();

        return redirect()->route('produkts.index')->with('success', 'Produkts dzēsts veiksmīgi!');
    }

    /**
     * Produkta meklēšanas funkcija izmantojot padoto pieeju formai izmantojot Request $request, lai ievadītu meklēto informāciju.
     * Produktu meklē pēc ievadītā saistību ar nosaukumu vai kategoriju.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $produkts = Produkt::where('nosaukums', 'LIKE', '%' . $searchTerm . '%')
        ->orWhere('kategorija', 'LIKE', '%' . $searchTerm . '%')
        ->get();
    
        return view('produkts.search_results', compact('produkts'));
    }
    /**
     * Produkta meklēšanas funkcija izmantojot padoto pieeju formai izmantojot Request $request, lai ievadītu meklēto informāciju.
     * Produktu meklētājs paredzēts produkta pievienošanai pie ēdiena. Produktu meklē pēc ievadītā saistības ar produkta nosaukumu.
     */
    public function searchForProduct(Request $request)
    {
        $search = $request->input('search');

        $products = Produkt::where('nosaukums', 'like', '%' . $search . '%')->get();

        return response()->json($products);
    }




}
