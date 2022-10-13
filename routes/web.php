<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthPagesController;
use App\Http\Controllers\ToursListController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\PopularTourController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PassController;

/*----- Routes Front Pages  ------*/
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::post('/', [PagesController::class, 'storenewsletter'])->name('newsletter');
Route::get('terminos-y-condiciones', [PagesController::class, 'terminosycondiciones'])->name('terminosycondiciones');
Route::get('tour/{tour}', [ToursListController::class, 'show'])->name('tours.show');
// Route::get('tour/{tour}', 'ToursController@show')->name('tours.show');

Route::get('nosotros', [PagesController::class, 'nosotros'])->name('nosotros');
Route::get('actividades', [AuthPagesController::class, 'actividades'])->name('actividades')->middleware('auth');
Route::get('detalle-actividades', [AuthPagesController::class, 'detalle-actividades'])->name('detalle-actividades');
Route::get('faq', [PagesController::class, 'faq'])->name('faq');
Route::get('actividad-dia-completo', [AuthPagesController::class, 'diacompleto'])->name('diacompleto')->middleware('auth');
Route::get('actividad-medio-dia', [AuthPagesController::class, 'mediodia'])->name('mediodia')->middleware('auth');
Route::get('actividad-nocturno', [AuthPagesController::class, 'nocturno'])->name('nocturno')->middleware('auth');

// Routes para la compra de Cancun Smart Pass
Route::get('buy/pass-checkout', [PassController::class, 'pass'])->name('buy-pass');
Route::post('buy/pass-checkout/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('buy/pass-checkout/approval', [PaymentController::class, 'approval'])->name('approval');
Route::get('buy/pass-checkout/cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');


// Routes para la compra de Tours
Route::post('cart-add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart-checkout', [CartController::class, 'cart'])->name('cart.checkout');
Route::post('cart-clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('cart-removeitem', [CartController::class, 'removeitem'])->name('cart.removeitem');
Route::post('place-order', [CartController::class, 'placeorder'])->name('place.order');

// Route::get('compar', 'PagesController@comprar')->name('comprar');

// Auth::routes(['register' => false]);
Auth::routes();

/*----- Routes Admin  ------*/
Route::group([
    'prefix' => 'dashboard',
    'namespace' => 'Admin',
    'middleware' => 'auth'],
    function (){
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('tours', [ToursController::class, 'index'])->name('dashboard.tours.index');
        Route::get('tours/create', [ToursController::class, 'create'])->name('dashboard.tours.create');
        Route::post('tours', [ToursController::class, 'store'])->name('dashboard.tours.store');
        Route::get('tours/{tour}', [ToursController::class, 'edit'])->name('dashboard.tours.edit');
        Route::put('tours/{tour}', [ToursController::class, 'update'])->name('dashboard.tours.update');
        Route::delete('tours/{tour}', [ToursController::class, 'destroy'])->name('dashboard.tours.destroy');

        Route::post('tours/{tour}/photos', [PhotosController::class, 'store'])->name('dashboard.tours.photos.store');
        Route::delete('/photos/{photo}', [PhotosController::class, 'destroy'])->name('dashboard.photos.destroy');

        Route::get('tours-popular', [PopularTourController::class, 'index'])->name('dashboard.populartours.index');
        Route::get('tours-popular/create', [PopularTourController::class, 'createpopulartour'])->name('dashboard.populartours.create');
        Route::post('tours-popular', [PopularTourController::class, 'storepopulartour'])->name('dashboard.populartours.store');
        Route::get('tours-popular/{tour}', [PopularTourController::class, 'editpopulartour'])->name('dashboard.populartours.edit');
        Route::put('tours-popular/{tour}', [PopularTourController::class, 'updatepopulartour'])->name('dashboard.populartours.update');

        // Route::post('tours/{tour}/photos', [PhotosController::class, 'store'])->name('dashboard.populartours.photos.store');
        // Route::delete('/photos/{photo}', [PhotosController::class, 'destroy'])->name('dashboard.photos.destroy');

});


