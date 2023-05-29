<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recepte;
use App\Models\Produkt;
use Illuminate\Http\Request;

class RecepteController extends Controller
{

        /**
        * Pāradresācijas funkcija uz /receptes sadaļu.
        */
        public function index()
        {
            $recipes = Recepte::all();
            return view('receptes.index', compact('recipes'));
        }
    
        /**
        * Ēdiena apskatīšana izmantojot padoto mainīgo - ēdiena id. Receptei padod produktus, kas ietilpst tajā.
        */
        public function showInfo($id)
        {
            $recipe = Recepte::findOrFail($id);
            $products = $recipe->produkts;

        return view('receptes.show', compact('recipe', 'products'));
        }

        /**
        * Pāradresācija uz ēdiena pievienošanas lapu.
        */
        public function create()
        {
            // izgūst visus pieejamos produktus ēdiena veidošanai
            $produkts = Produkt::all();

            // pievieno produktus skatam
            return view('receptes.create', compact('produkts'));
        }
    
        /**
        * Ēdiena pievienošanas glabāšanas funkcija ar validāciju pirms ēdiena pievienošanas.
        */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'guide' => 'required',
                'produkts' => 'required|array',
                'produkts.*.svars' => 'required|numeric|min:0',
            ]);

            // izveido recepti recepšu datu bāzē
            $recipe = Recepte::create([
                'nosaukums' => $validatedData['name'],
                'apraksts' => $validatedData['guide'],
            ]);

            // pievieno produktus datu bāzei ar to norādīto svaru
            foreach ($validatedData['produkts'] as $produktId => $produktData) {
                $recipe->produkts()->attach($produktId, ['svars' => $produktData['svars']]);
            }

            return redirect()->route('receptes.show', $recipe->id)->with('success', 'Recipe created successfully!');
        }


        /**
        * Ēdiena meklēšanas funkcija izmantojot padoto pieeju formai izmantojot Request $request, lai ievadītu meklēto informāciju.
        * Ēdienu meklē pēc ievadītā saistības ar nosaukumu vai aprakstu.
        */
        public function search(Request $request)
        {
            $searchTerm = $request->input('search');
            $recipes = Recepte::where('nosaukums', 'LIKE', '%' . $searchTerm . '%')->orWhere('apraksts', 'LIKE', '%' . $searchTerm . '%')->get();

            return view('receptes.search_results', compact('recipes'));
        }

        /**
        * Pāradresācijas funkcija uz ēdiena izmainīšanu, izmantojot padoto mainīgo - ēdiena id.
        */
        public function edit($id)
        {
            // meklē recepti
            $recipe = Recepte::findOrFail($id);

            // izgūst produktus, kas pievienoti receptei
            $products = $recipe->produkts()->get();

            // padod recepti un produktus receptē rediģēšanas skatam
            return view('receptes.edit', compact('recipe', 'products'));
        }

        /**
        * Ēdiena izmainīšanas funkcija izmantojot padotos - pieeju formai izmantojot Request $request un ēdiena id
        */
        public function update(Request $request, $id)
        {
            $recipe = Recepte::findOrFail($id);

            $validatedData = $request->validate([
                'nosaukums' => 'required',
                'apraksts' => 'required',
            ]);

            $recipe->update($validatedData);

            return redirect()->route('receptes.show', $recipe->id);
        }

        /**
        * Ēdiena dzēšanas funkcija izmantojot padoto ēdiena id
        */
        public function delete($id)
        {
            $recipe = Recepte::find($id);

            if (!$recipe) {
                return redirect()->back()->with('error', 'Recepte nav atrasta!');
            }

            $recipe->delete();

            return redirect()->route('receptes.index')->with('success', 'Recepte dzēsta veiksmīgi!');
        }

        
        

}
    

    
    