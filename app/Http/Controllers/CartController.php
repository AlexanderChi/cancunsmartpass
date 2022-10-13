<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Tour;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        $tour = Tour::find($request->tour_id);

        Cart::add(
            $tour->id,
            $tour->nombre,
            $tour->PRAD,
            1,
            array()
        );
        // return view('comprar', compact('cancunsmartpass'));
        return back()->with('success', "$tour->name ¡Se ha agregado con éxito al carrito de compra!");
    }

    public function cart()
    {

        $tour = Tour::all();

        return view('checkout', compact('tour'));
    }


    public function removeitem(Request $request)
    {
        // $tour = Tour::where('id', $request->id)->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Producto eliminado con éxito de su carrito");
    }

    public function clear()
    {
        Cart::clear();

        return back()->with('sucess', "");
    }

    public function placeorder()
    {

    }
    // ************* Prueba de otras funciones ********************************************************************************

    // public function shop()
    // {
    //     $tours = Tour::all();
    //    dd($tours);
    //     return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $tours]);
    // }

    // public function cart()  {
    //     $cartCollection = Cart::getContent();
    //     //dd($cartCollection);
    //     return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    // }
    // public function remove(Request $request){
    //     \Cart::remove($request->id);
    //     return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    // }

    // public function add(Request$request){
    //     \Cart::add(array(
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'quantity' => $request->quantity,
    //         'attributes' => array(
    //             'image' => $request->img,
    //             'slug' => $request->slug
    //         )
    //     ));
    //     return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    // }

    // public function update(Request $request){
    //     \Cart::update($request->id,
    //         array(
    //             'quantity' => array(
    //                 'relative' => false,
    //                 'value' => $request->quantity
    //             ),
    //     ));
    //     return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    // }

    // public function clear(){
    //     \Cart::clear();
    //     return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    // }


}
