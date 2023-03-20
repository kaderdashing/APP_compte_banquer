<?php

namespace App\Http\Controllers;

use App\Models\Depenses;
use App\Models\User;
use App\Models\Categorie;
//use Inertia\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();



        //les categorie du user connecter 
        $userCategories = Auth::user()->categories()->pluck('id','name')->all();
    
  
        // j'ai recuperer les depenses paraport au categorie 
        $expenses = DB::table('depenses')->whereIn('categorie_id', $userCategories)->orderBy('categorie_id')->get()->all();
     //  $expenses = Depenses::whereIn('categorie_id', $userCategories)->orderBy('categorie_id')->get(); 
 
        return inertia(
            'Realtor/Index/Components/Show', [
                'expenses' => $expenses,
                'userCategories' =>$userCategories

            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fields=  $request->validate([
            'nom' => ['required', 'string'],
            'commentaire' => ['required', 'string'],
            'prix' => ['required', 'numeric', 'min:0']
        ]);
        $depenses = new Depenses();
        $depenses->nom = $fields['nom'];
        $depenses->commentaire = $fields['commentaire'];
        $depenses->prix = $fields['prix'];
        $depenses->user_id = auth()->id(); // Si vous souhaitez enregistrer l'utilisateur actuellement connecté comme créateur de la dépense
        $depenses->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function show(Depenses $depenses)
    {
        //
    }

  /**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Depenses  $depenses
 * @return \Illuminate\Http\Response
 */
    public function edit(Depenses $depenses ,$id)
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
       dd($ToReturn) ;
    }


//ici on récupére les depense pour une categorie specifique

/*

    public function edit(Depenses $depenses ,$id)
    {
        $depenses = Depenses::where('categorie_id', $id)
        ->select('nom', 'categorie_id', 'prix')
        ->get();
    //    $sommePrix = $depenses->sum('prix');
    $dateAujourdhui = date('Y-m-d');
    $sommePrixAujourdhui = Depenses::whereDate('created_at', $dateAujourdhui)
                                   ->sum('prix');

        dd($sommePrixAujourdhui);
    }













*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depenses $depenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depenses $depenses)
    {
        //
    }
    
}
