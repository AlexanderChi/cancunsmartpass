<?php

namespace App\Http\Controllers;

use App\Models\Cancunsmartpass;
use Stripe\SKU;
use Stripe\Stripe;
use App\Models\Tour;
use App\Models\User;
use App\Models\Category;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\UserNewletter;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function index()
    {
        $tours = Tour::latest('fecha_publicacion')->limit(3)->get();
        $passes = Cancunsmartpass::all();
        return view('welcome', compact('tours', 'passes'));
    }

    public function terminosycondiciones()
    {
        return view('terminosycondiciones');
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function faq()
    {
        return view('faqs');
    }

    public function storenewsletter(Request $request){

        // UserNewletter::create($request->email);
        UserNewletter::create(['email'=>$request->email]);
        $mail_controller = new EmailController;

        $subscriber_message = Newsletter::where('action', 'NEWLETTER_SUBSCRIPTION_CUSTOMER')->first();
        $admin_message = Newsletter::where('action', 'NEWLETTER_SUBSCRIPTION_ADMIN')->first();

        if ($subscriber_message) {
            $mail_controller->sendEmail($subscriber_message->title, $subscriber_message->subjetc, $subscriber_message->body, $request->email);
        }
        if ($admin_message) {
            $admins = User::where('email', 'sistemas@altustours.com')->get();
            foreach ($admins as $admin) {
                $mail_controller->sendEmail($admin_message->title, $admin_message->subjetc, $admin_message->body, $admin->email, '', 'Admin');
            }
        }

        return back();
    }

}
