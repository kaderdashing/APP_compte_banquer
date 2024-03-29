<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RealtorListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show'])
  ->middleware('auth');

Route::resource('listing', ListingController::class)
  ->only(['index', 'show' ]);


  //Route::get('realtor/index/components/realtorshow', [ListingController::class, 'fethi']);
Route::get('login', [AuthController::class, 'create'])
  ->name('login');
Route::post('login', [AuthController::class, 'store'])
  ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
  ->name('logout');

Route::resource('user-account', UserAccountController::class)
  ->only(['create', 'store']);

Route::prefix('realtor')
  ->name('realtor.')
  ->middleware('auth')
  ->group(function () {
    Route::name('listing.restore')
      ->put(
        'listing/{listing}/restore',
        [RealtorListingController::class, 'restore']
      )->withTrashed();
    Route::resource('listing', RealtorListingController::class)
      ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
      ->withTrashed();
  });
//----------------------------------------------------------------------------------------------------------
route::resource('depenses',DepenseController::class) ;

//route::get('solde',[ListingController::class, 'solde'])->name('realtor.solde');

//Route::get('realtor/index/components/create', [ListingController::class, 'solde'])->name('realtor.index.components.create');
Route::get('realtor/index/components/create', [CategorieController::class, 'fethi'])->name('realtor.index.components.create');
