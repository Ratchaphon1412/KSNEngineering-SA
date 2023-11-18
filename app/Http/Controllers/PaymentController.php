<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Payments\Omise;

use App\Models\Payment;
use App\Models\Repair;
use DateTime;
use DateTimeZone;

class PaymentController extends Controller
{
    //

    public function link($amount, Repair $repair)
    {

        return view('seller.payment-link', compact('amount', 'repair'));
    }

    public function charge(Request $request)
    {
        $token = $request->get('_token');
        $omiseToken = $request->get('omiseToken');
        $omiseSource = $request->get('omiseSource');
        $amount = $request->get('amount');
        $repair = $request->get('repair_id');


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
                $id = $charge_array['id'];
                $pay = $charge_array['amount'] / 100;
                $payment_method = $charge_array['source']['type'];
                $payment_status = $charge_array['status'];
                $created_at = $charge_array['created_at'];

                $created_at = new DateTime($charge_array['created_at']);
                $created_at = $created_at->format('Y-m-d H:i:s');


                $payment = Payment::create([
                    'transection_token' => $id,
                    'payment_method' => $payment_method,
                    'pay' => $pay,
                    'payment_status' => $payment_status,
                    'create_at' => $created_at,
                    'repair_id' => $repair
                ]);







                return redirect($charge_array['authorize_uri']);
            } elseif ($charge_array['source']['type'] == 'mobile_banking_bbl' || $charge_array['source']['type'] == 'mobile_banking_kbank' || $charge_array['source']['type'] == 'mobile_banking_ktb' || $charge_array['source']['type'] == 'mobile_banking_bay' || $charge_array['source']['type'] == 'mobile_banking_scb') {

                $id = $charge_array['id'];
                $pay = $charge_array['amount'] / 100;
                $payment_method = $charge_array['source']['type'];
                $payment_status = $charge_array['status'];
                $created_at = $charge_array['created_at'];

                $created_at = new DateTime($charge_array['created_at']);
                $created_at = $created_at->format('Y-m-d H:i:s');


                $payment = Payment::create([
                    'transection_token' => $id,
                    'payment_method' => $payment_method,
                    'pay' => $pay,
                    'payment_status' => $payment_status,
                    'create_at' => $created_at,
                    'repair_id' => $repair
                ]);

                return redirect($charge_array['authorize_uri']);
            } elseif ($charge_array['source']['type'] == 'promptpay') {

                $qrcode = $charge_array['source']['scannable_code']['image']['download_uri'];
                $expires_at = $charge_array['expires_at'];
                $create_at = $charge_array['created_at'];
                $authorize_uri = $charge_array['authorize_uri'];

                $id = $charge_array['id'];
                $pay = $charge_array['amount'] / 100;
                $payment_method = $charge_array['source']['type'];
                $payment_status = $charge_array['status'];
                $created_at = $charge_array['created_at'];

                $created_at = new DateTime($charge_array['created_at']);
                $created_at = $created_at->format('Y-m-d H:i:s');


                $payment = Payment::create([
                    'transection_token' => $id,
                    'payment_method' => $payment_method,
                    'pay' => $pay,
                    'payment_status' => $payment_status,
                    'create_at' => $created_at,
                    'repair_id' => $repair
                ]);

                // $response = Omise::ChargePaid($id);


                return view('seller.payment-qr', compact('qrcode', 'expires_at', 'create_at', 'authorize_uri', 'pay', 'id'));
            }
        }





        // $amount = $request->get('amount');

        // $source = Omise::RetrieveSource($omiseSource);
        // $source_array = $source->toArray();

        // $charge = Omise::Charge($token,$amount, $omiseSource);
    }


    public function chargePaid(Request $request)
    {
        $charge_id = $request->get('charge_id');
        $charge = Omise::ChargePaid($charge_id);
        // $charge_array = $charge->toArray();
        // $status = $charge_array['status'];

        // return view('seller.payment-confirm', compact('status'));
        // return view('seller.payment-confirm', compact('status'));
        return $charge;
    }

    public function chargeFailed(Request $request)
    {
        $charge_id = $request->get('charge_id');
        $charge = Omise::ChargeFailed($charge_id);
        // $charge_array = $charge->toArray();
        // $status = $charge_array['status'];
        return $charge;

        // return view('seller.payment-confirm', compact('status'));
        // return view('seller.payment-confirm', compact('status'));
    }
}
