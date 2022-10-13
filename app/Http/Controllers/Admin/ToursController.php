<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tour;
use App\Models\Category;
use App\Models\TypeChange;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToursController extends Controller
{
    public function index(){

        $tours = Tour::latest('id')->get();

        return view('admin.tours.index', compact('tours'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required']);

        $tour = Tour::create([
            'nombre' => $request->get('nombre'),
            'url'   => Str::slug($request->get('nombre')),
        ]);

        return redirect()->route('dashboard.tours.edit', $tour);
    }

    public function edit(Tour $tour)
    {
        $categories = Category::all();
        $typechange = TypeChange::all();
        $destinations = Destination::all();
        $paquete = [
            "Individual",
            "Pareja"
        ];

        $status = [
            "Activado",
            "Desactivado"
        ];

        return view('admin.tours.edit', compact('categories','typechange', 'destinations', 'paquete', 'status', 'tour'));
    }

    public function update(Tour $tour, Request $request){
        // Validacion
        $this->validate($request, [
            'nombre'            => 'required|min:5|max:50',
            'descripcion'       => 'required|min:5|max:1000',
            'incluye'           => 'required|min:5|max:1000',
            'pickup'            => 'required|min:5|max:1000',
            'recomendacion'     => 'required|min:5|max:500',
            'extra'             => 'required|min:5|max:500',
            'name'              => 'required|min:5|max:500',
            'desc_eng'          => 'required|min:5|max:1000',
            'incluye_eng'       => 'required|min:5|max:1000',
            'pickup_eng'        => 'required|min:5|max:1000',
            'recomendacion_eng' => 'required|min:5|max:500',
            'extra_eng'         => 'required|min:5|max:500',
            'PRAD'              => 'required',
            'PRMD'              => 'required',
            'paquete'           => 'required',
            'category'          => 'required',
            'destinations'      => 'required',
            'change'            => 'required',
            'status'            => 'required',
        ]);

        // return $request->all();

        // return Tour::create($request->all());
        //    $tour = new Tour();

       $tour->nombre                = $request->get('nombre');
       $tour->url                   = Str::slug($request->get('nombre'));
       $tour->desc                  = $request->get('descripcion');
       $tour->incluye               = $request->get('incluye');
       $tour->pickup                = $request->get('pickup');
       $tour->recomendacion         = $request->get('recomendacion');
       $tour->extra                 = $request->get('extra');
       //ingles
       $tour->name                  = $request->get('name');
       $tour->desc_eng              = $request->get('desc_eng');
       $tour->incluye_eng           = $request->get('incluye_eng');
       $tour->pickup_eng            = $request->get('pickup_eng');
       $tour->recomendacion_eng     = $request->get('recomendacion_eng');
       $tour->extra_eng             = $request->get('extra_eng');
       $tour->PRAD                  = $request->get('PRAD');
       $tour->PRMD                  = $request->get('PRMD');
       $tour->paquete               = $request->get('paquete');
       $tour->category_id           = $request->get('category');
       $tour->tipo_cambios_id       = $request->get('change');
       $tour->status                = $request->get('status');
       $tour->fecha_modificacion    = Carbon::now();
       $tour->fecha_publicacion     = Carbon::now();
       $tour->user_id = Auth()->user()->id;
       $tour->save();

       $tour->destinations()->sync($request->get('destinations'));

       return redirect()->route('dashboard.tours.index', $tour)->with('flash', 'La publicacion ha sido guardada');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('dashboard.tours.index')->with('flash', 'La publicacion ha sido eliminada');
    }
}
