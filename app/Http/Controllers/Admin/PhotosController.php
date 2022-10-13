<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Tour $tour, Request $request)
    {
        //Validar
        $this->validate(request(), [
           'photo' => 'required|image|max:5140' // jpeg, png, bmp, gif, svg
        ]);

        $photo = request()->file('photo')->store('public');

        Photo::create([
            'url'       => Storage::url($photo),
            'tour_id'   => $tour->id
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);

        return back()->with('flash', 'Foto eliminada');
    }
}
