<?php

namespace App\Http\Controllers;

use App\Models\Cancunsmartpass;
use Stripe\Stripe;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class AuthPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function actividades()
    {
        // $tours = Tour::all()->orWhere('category_id' == 1);
        // Category::with('posts')->findOrFail($idCategory);
        // $tours = DB::table('tours')->where('category_id', '=', '1')->get();

        // $tours = Tour::all();
        // dd($amd = DB::table('tours')->where('category_id', '=', '3')->get());

        $amd = Tour::latest('id')->where('category_id', '=', '1')->limit(3)->get();
        $adc = Tour::latest('id')->where('category_id', '=', '2')->limit(3)->get();
        $an = Tour::latest('id')->where('category_id', '=', '3')->limit(3)->get();

        return view('actividades', compact('amd', 'adc', 'an' ));
    }

    public function detalleactividades()
    {
        return view('detalle-actividad');
    }

    public function diacompleto()
    {
        // $tours = Tour::latest('id')->where('category_id', '=', '2');
        $tours = Tour::all()->where('category_id', '=', '2');

        return view('actividaddiacompleto', compact('tours'));
    }

    public function mediodia()
    {
        $tours = Tour::all()->where('category_id', '=', '1');
        return view('actividad-medio-dia', compact('tours'));
    }

    public function nocturno()
    {
        $tours = Tour::all()->where('category_id', '=', '3');
        return view('actividad-nocturno', compact('tours'));
    }

    // public function comprar(User $user)
    // {
    //     $cancunsmartpass = Cancunsmartpass::all();

    //     // Stripe::setApiKey('sk_test_51LC6oCLk6F3VXwEBlCiIt1LJbhmEK5dAUes9Eriu1zoExT8z6zXF3IDuNccrfs4X6qtdsGaEkMBUrLObyPme7dpc00Y9DR5svf');
    //     // dd($user);
    //     return view('comprar', compact('cancunsmartpass', 'user'));
    // }

}
