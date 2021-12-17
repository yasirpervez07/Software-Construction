<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentPackage;
use Illuminate\Http\Request;
use Session;
use Stripe;

class PaymentController extends Controller
{


    public function stripe()

    {

        return view('stripe/stripe');

    }


    public function stripePost(Request $request)
    {
        // dd('h');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test Payment"

        ]);

        $package_id=1;
        $package=PaymentPackage::where('id',$package_id)->first();

        Payment::create([
            'user_id'=>auth()->user()->id,
            'package_id'=>1,
            'amount'=>$package->amount,
            'expires_at'=>now()->addDays($package->days)
        ]);
            dd('h');
          Session::flash('success', 'Payment successful!');

        return back();

    }
}
