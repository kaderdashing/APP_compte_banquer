<?php

namespace App\Http\Controllers;

use App\Models\Depenses;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{


    private function depenser(Depenses $depenses )
    {
        //ici on essai de récupérer les depenses d'aujourd'hui pour toutes les categories 
        // on a pas encore specifier pour le user_id
        $dateAujourdhui = date('Y-m-d');
        $depenses = Depenses::whereDate('created_at', $dateAujourdhui)
                             ->select('categorie_id', DB::raw('SUM(prix) as sommePrix'))
                             ->groupBy('categorie_id')
                             ->get();
    
        $sommeParCategorie = [];
      
        foreach ($depenses as $depense) {
           
            $sommeParCategorie[$depense->categorie_id] = $depense->sommePrix;
        }
        // on recupére les clés de categorie_id modifier aujour'hui
        $categories_modifier=  array_keys( $sommeParCategorie) ;
        
         //on récupére les categorie du user_auth 
         $user_id = Auth::user()->id;
         $categories = Categorie::where('user_id', $user_id)
         ->pluck('id');
         $categories_auth =$categories->toArray();
       // l'intersection entre les categorie du user auth et les categorie modifier aujourd'hui
       //ca donne les categories pour le user modifier aujourd'hui   
       $intersect=  array_intersect($categories_auth,$categories_modifier);
        // changer entre le prix et le key value
       $kader=array_flip($sommeParCategorie) ;
       // récuperer seulement les depenses faite aujourd'hui
       $final= array_intersect($kader,$intersect) ;
       // valeur a retourner 
       
       $ToReturn =array_flip($final) ;
  /*     return inertia(
        'Realtor/Index/Components/Create', [
            'dep_day' => $ToReturn

        ]); */
        return $ToReturn ;
    }


    public function fethi()
    {
        $user_id = auth()->id();
        $depensesDuJour = $this->depenser(new Depenses); 
        return inertia(
            'Realtor/Index/Components/Create', [
                'kader' => Categorie::where('user_id', $user_id)
                   
                    
                    ->get() ,
                    'depensesDuJour' => $depensesDuJour  ,
                    'user' => Auth::user()->solde ,
                   

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
