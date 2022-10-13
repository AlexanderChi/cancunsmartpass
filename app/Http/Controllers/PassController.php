<?php

namespace App\Http\Controllers;

// use Darryldecode\Cart\Cart;
use Cart;
use App\Models\Pass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cancunsmartpass;
use App\Models\Currency;
use App\Models\PaymentPlatform;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pass()
    {

        $cancunsmartpass = Cancunsmartpass::all();
        // $currencies = Currency::latest('iso')->where('iso', '=', 'usd')->get();
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all();
        $users = User::all();
        // $pass = DB::table('cancunsmartpasses')->get();

        return view('comprar', compact(
            'cancunsmartpass',
            'users',
            'currencies',
            'paymentPlatforms'
        ));
    }

    // public function placeorder(Request $request)
    // {
    //     $order = new Pass();
    //     $order->PassName = $request->input('PassName');
    //     $order->PassLastName = $request->input('PassLastName');
    //     $order-f>PassEmail = $request->input('PassEmail');
    //     $order->PassPhone = $request->input('PassPhone');
    //     $order->PassCountry = $request->input('PassCountry');
    //     $order->PassCity = $request->input('PassCity');
    //     $order->PassExtraPerson = $request->input('PassExtraPerson');
    //     $order->PassFolio = 'CSP'.rand(1111,9999);
    //     $order->save();

    //     $order->PassId;

    //     if (Auth::user()->PassCity == NULL) {
    //         $user = User::where('id', Auth::id()->first());
    //         $user->PassName = $request->input('PassName');
    //         $user->PassLastName = $request->input('PassLastName');
    //         $user->PassEmail = $request->input('PassEmail');
    //         $user->PassPhone = $request->input('PassPhone');
    //         $user->PassCountry = $request->input('PassCountry');
    //         $user->PassCity = $request->input('PassCity');
    //     }

    // }
}
