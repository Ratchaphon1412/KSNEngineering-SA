<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Payments\Omise;

class PaymentController extends Controller
{
    //

    public function link($amount)
    {
        return view('seller.payment-link', compact('amount'));
    }

    public function charge(Request $request)
    {
        $token = $request->get('_token');
        $omiseToken = $request->get('omiseToken');
        $omiseSource = $request->get('omiseSource');
        dd($request->all());

        // $amount = $request->get('amount');

        // $source = Omise::RetrieveSource($omiseSource);
        // $source_array = $source->toArray();

        // $charge = Omise::Charge($token,$amount, $omiseSource);
    }
}
