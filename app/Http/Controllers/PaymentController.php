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
        $amount = $request->get('amount');

        // dd($request->all());

        if ($omiseToken != null) {
            $charge = Omise::ChargeCreditCard($amount, $omiseToken);
            $charge_array = $charge->toArray();
            $status = $charge_array['status'];

            return view('seller.payment-confirm', compact('status'));
        } else {

            $charge = Omise::Charge($amount, $omiseSource);
            $charge_array = $charge->toArray();

            if ($charge_array['source']['type'] == 'internet_banking_bay' || $charge_array['source']['type'] == 'internet_banking_bbl') {

                return redirect($charge_array['authorize_uri']);
            } elseif ($charge_array['source']['type'] == 'mobile_banking_bbl' || $charge_array['source']['type'] == 'mobile_banking_kbank' || $charge_array['source']['type'] == 'mobile_banking_ktb' || $charge_array['source']['type'] == 'mobile_banking_bay' || $charge_array['source']['type'] == 'mobile_banking_scb') {

                return redirect($charge_array['authorize_uri']);
            } elseif ($charge_array['source']['type'] == 'promptpay') {

                $qrcode = $charge_array['source']['scannable_code']['image']['download_uri'];
                $expires_at = $charge_array['expires_at'];
                $create_at = $charge_array['created_at'];
                $authorize_uri = $charge_array['authorize_uri'];



                return view('seller.payment-qr', compact('qrcode', 'expires_at', 'create_at', 'authorize_uri'));
            }
        }


        // $amount = $request->get('amount');

        // $source = Omise::RetrieveSource($omiseSource);
        // $source_array = $source->toArray();

        // $charge = Omise::Charge($token,$amount, $omiseSource);
    }
}
