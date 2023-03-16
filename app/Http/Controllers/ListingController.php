<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Depenses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }
    public function fethi()
    {
        $user_id = auth()->id();
        
        return inertia(
            'Realtor/Index/Components/Create', [
                'kader' => Depenses::where('user_id', $user_id)
                    ->whereDate('created_at', today())
                    ->orderBy('created_at', 'desc')
                    ->get() ,
                    'user' => Auth::user()->solde

            ]);
    } 

   /* public function solde()
    {
        
        return inertia(
            'Realtor/Index/Components/Create', [
                'user' => Auth::user()->solde
            ]);
    } 
    */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }
        // $this->authorize('view', $listing);

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }
}
