<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function fethi()
    {
        $user_id = auth()->id();
        
        return inertia(
            'Realtor/Index/Components/Create', [
                'kader' => Categorie::where('user_id', $user_id)
                   
                    
                    ->get() ,
                    'user' => Auth::user()->solde

            ]);


    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {

    }

    public function show(Categorie $categorie)
    {
      
    }

    public function edit(Categorie $categorie)
    {
      
    }

    public function update(Request $request, Categorie $categorie)
    {

    }

    public function destroy(Categorie $categorie)
    {

    }
}
