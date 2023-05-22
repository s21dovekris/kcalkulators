<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Enums\ProduktKategorijaEnum;

class ProduktController extends Controller
{
    //
    
    public function index() {
        $produkts = Produkt::latest()->paginate(10);

        return view('produkts.produkts', compact('produkts'))->with(request()->input('page'));
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

    /*

    public function search(Request $request) {
        
        $produkts = Produkt::where('nosaukums', 'LIKE', '%'.$request->search.'%')->get();

        $output = '';
        
        foreach($produkts as $produkt) {
            $output.= 
            '<tr>
            
            <td>
            '.$produkt->nosaukums.'</td>
            <td>
            '.$produkt->kategorija.'</td>
            <td>
            '.$produkt->kaloritate.'</td>
            </tr>';
        }
        
        return response($output);

        

    }*/
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $produkts = Produkt::where('nosaukums', 'LIKE', '%'.$searchTerm.'%')->get();
    
        $output = '';
    
        if ($produkts->count() > 0) {
            foreach ($produkts as $produkt) {
                $output .= '<tr>
                    <td>'.$produkt->nosaukums.'</td>
                    <td>'.$produkt->kategorija->getValue().'</td> // Use getValue() to retrieve the string value of the ProduktKategorijaEnum
                    <td>'.$produkt->kaloritate.'</td>
                </tr>';
            }
        } else {
            $output = '<tr>
                <td colspan="4" class="text-center">Nav atrasts neviens produkts.</td>
            </tr>';
        }
    
        return response($output);
    }






}
