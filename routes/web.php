<?php

use App\UI\Action\Admin\HomeAdminAction;
use App\UI\Action\Admin\Product\ProductCreationAction;
use App\UI\Action\Admin\Shop\ShopCreationAction;
use App\UI\Action\Admin\Shop\ShopShowAllAction;
use App\UI\Action\Admin\Shop\ShopShowOneAction;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
   Route::get('/', HomeAdminAction::class)->name('admin');

   Route::group(['prefix' => 'shop'], function () {
      Route::get('/', ShopShowAllAction::class)->name('shopShowAll');
      Route::get('/voir/{shopSlug}', ShopShowOneAction::class)->name('showShowOne');
      Route::post('/add', ShopCreationAction::class)->name('shopAdd');
   });

   Route::group(['prefix' => 'produits'], function () {
      Route::get('/voir/{productSlug}')->name('productShowAll');
      Route::post('/add', ProductCreationAction::class)->name('productAdd');
   });
});

require __DIR__.'/auth.php';
