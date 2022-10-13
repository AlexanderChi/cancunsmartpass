<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\TypeChange;
use App\Models\Destination;
use App\Models\PopularTour;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopularTourController extends Controller
{
    public function index()
    {
        $tourspopular = PopularTour::latest('id')->get();

        return view('admin.tourspopular.index', compact('tourspopular'));
    }

    public function storepopulartour(Request $request)
    {
        $this->validate($request, ['nombre' => 'required']);

        $tourspopular = PopularTour::create([
            'nombre' => $request->get('nombre'),
            'url'   => Str::slug($request->get('nombre')),
        ]);

        return redirect()->route('dashboard.populartours.edit', $tourspopular);
    }

    public function editpopulartour(PopularTour $tourspopular)
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

        return view('admin.tourspopular.edit', compact('categories','typechange', 'destinations', 'paquete', 'status', 'tourspopular'));
    }

    public function updatepopulartour(PopularTour $tourspopular, Request $request){
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

       $tourspopular->nombre                = $request->get('nombre');
       $tourspopular->url                   = Str::slug($request->get('nombre'));
       $tourspopular->desc                  = $request->get('descripcion');
       $tourspopular->incluye               = $request->get('incluye');
       $tourspopular->pickup                = $request->get('pickup');
       $tourspopular->recomendacion         = $request->get('recomendacion');
       $tourspopular->extra                 = $request->get('extra');
       //ingles
       $tourspopular->name                  = $request->get('name');
       $tourspopular->desc_eng              = $request->get('desc_eng');
       $tourspopular->incluye_eng           = $request->get('incluye_eng');
       $tourspopular->pickup_eng            = $request->get('pickup_eng');
       $tourspopular->recomendacion_eng     = $request->get('recomendacion_eng');
       $tourspopular->extra_eng             = $request->get('extra_eng');
       $tourspopular->PRAD                  = $request->get('PRAD');
       $tourspopular->PRMD                  = $request->get('PRMD');
       $tourspopular->paquete               = $request->get('paquete');
       $tourspopular->category_id           = $request->get('category');
       $tourspopular->tipo_cambios_id       = $request->get('change');
       $tourspopular->status                = $request->get('status');
       $tourspopular->fecha_modificacion    = Carbon::now();
       $tourspopular->fecha_publicacion     = Carbon::now();
       $tourspopular->user_id = Auth()->user()->id;
       $tourspopular->save();

       $tourspopular->destinations()->sync($request->get('destinations'));

       return redirect()->route('dashboard.populartours.index', $tourspopular)->with('flash', 'La publicacion ha sido guardada');
    }
}
