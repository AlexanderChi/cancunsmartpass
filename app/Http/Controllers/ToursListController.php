<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Tour;
use Illuminate\Http\Request;

class ToursListController extends Controller
{
    public function show(Tour $tour)
    {
        Stripe::setApiKey('sk_test_51LC6oCLk6F3VXwEBlCiIt1LJbhmEK5dAUes9Eriu1zoExT8z6zXF3IDuNccrfs4X6qtdsGaEkMBUrLObyPme7dpc00Y9DR5svf');

        return view('tours.show', compact('tour'));
    }
}
