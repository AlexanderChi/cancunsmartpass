<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function pay(Request $request)
    {
        $rules = [
            'PassName'          => ['required', 'min:5', 'max:50'],
            'PassLastName'      => ['required', 'min:2', 'max:50'],
            'PassEmail'             => ['required', 'min:5', 'max:50'],
            'PassPhone'               => ['required', 'max:50'],
            'PassCountry'       => ['required', 'min:5', 'max:50'],
            'PassCity'          => ['required', 'min:5', 'max:50'],
            'PassExtraPerson'   => ['min:0', 'max:10'],
            'payment_platform'  => ['required', 'exists:payment_platforms,name'],
            'total_pago'  => ['required', 'string', 'min:2'],
            'currency' => ['required', 'string', 'max:3'],
        ];

        $request->validate($rules);
        return $request->all();
    }

    public function approval()
    {
        //
    }

    public function cancelled()
    {
        //
    }

    // public function __construct()
    // {
    //     $this->gateway = Omnipay::create('PayPal_Rest');
    //     $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
    //     $this->gateway->setSecret(env('PAYPAL_APP_SECRET'));
    //     $this->gateway->setTestMode(true);
    // }

    // public function pay(Request $request, Tour $tour)
    // {
    //     // $tours = Tour::all();
    //     try {
    //         $response = $this->gateway->purchase(array(
    //             'amount' => $request->amount,
    //             'currency' => env('PAYPAL_CURRENCY'),
    //             'returnUrl' => url('success'),
    //             'cancelUrl' => url('error')
    //         ))->send();

    //         if ($response->isRedirect()) {
    //             $response->redirect();
    //         }
    //         else{
    //             return $response->getMessage();
    //         }
    //     } catch (\Throwable $th) {
    //         return $th->getMessage();
    //     }
    //     // return "hola";
    // }

    // public function success(Request $request, Tour $tour)
    // {
    //     if ($request->input('paymentId') && $request->input('PayerID')) {
    //         $transaction = $this->gateway->completePurchase(array(
    //             'payer_id' => $request->input('PayerID'),
    //             'transactionReference' => $request->input('paymentId')
    //         ));

    //         $response = $transaction->send();

    //         if($response->isSuccessful()){
    //             $arr = $response->getData();

    //             $payment = new Payment();
    //             $payment->payment_id = $arr['id'];
    //             $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
    //             $payment->payer_email = $arr['payer']['payer_info']['email'];
    //             $payment->amount = $arr['transactions'][0]['amount']['total'];
    //             $payment->currency = env('PAYPAL_CURRENCY');
    //             $payment->payment_status = $arr['state'];

    //             $payment->save();

    //             // return redirect()->route('voucher', $arr);
    //             return view('voucher', compact('payment', 'tour'));
    //             // return "Payment is Successfull. Your Transaction ID is: " . $arr['id'];
    //         }
    //         else {
    //             return $response->getMessage();
    //         }
    //     }
    //     else{
    //         return 'Payment Declined!!';
    //     }
    // }

    // public function error()
    // {
    //     return 'User declined the payment!';
    // }


}
