<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;

class ProduktController extends Controller
{
    //
    public function index() {
        $produkts = Produkt::latest()->paginate(10);

        return view('index', compact('produkts'))->with(request()->input('page'));
    }

    public function show($id)
    {
        $product = Produkt::find($id);

        return view('produkts.show', compact('produkts'));
    }

    public function search(Request $request) {
        
        $produkts = Produkt::where('nosaukums', 'LIKE', '%'.$request->search.'%')->get();

        $output = '';
        
        foreach($produkts as $produkts) {
            $output.= 
            '<tr>
            
            <td>
            '.$produkts->nosaukums.'</td>
            <td>
            '.$produkts->kategorija.'</td>
            <td>
            '.$produkts->kaloritate.'</td>
            </tr>';
        }
        return response($output);

        

    }
}
