<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $amd = Tour::latest('id')->where('category_id', '=', '1')->limit(3)->get();
        $adc = Tour::latest('id')->where('category_id', '=', '2')->limit(3)->get();
        $an = Tour::latest('id')->where('category_id', '=', '3')->limit(3)->get();

        return view('actividades', compact('amd', 'adc', 'an' ));

        // return view('admin.dashboard');
    }
}
