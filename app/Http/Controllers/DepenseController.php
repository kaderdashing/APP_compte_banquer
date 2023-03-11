<?php

namespace App\Http\Controllers;

use App\Models\Depenses;
//use Inertia\Controller;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // remplacer par la function fethi() dans le Listing Controller 
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
    public function edit(Depenses $depenses)
    {
        //
    }

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
