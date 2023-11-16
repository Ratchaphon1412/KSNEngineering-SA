<?php

namespace App\Service\Payments;

use OmiseTransaction;
use OmiseBalance;
use OmiseSource;
use OmiseCharge;
use Illuminate\Support\Facades\Http;
use DateTime;
use DateInterval;


define('OMISE_PUBLIC_KEY',  env('OMISE_PUBLIC_KEY'));
define('OMISE_SECRET_KEY', env('OMISE_SECRET_KEY'));
define('OMISE_API_VERSION', env('OMISE_API_VERSION'));


class Omise
{

    public static function AllTransection()
    {
        $transactions = OmiseTransaction::retrieve();
        return $transactions;
    }

    public static function AdminBalance()
    {
        $balance = OmiseBalance::retrieve();
        return $balance;
    }

    public static function RetrieveSource($source)
    {
        $source = OmiseSource::retrieve($source);
        return $source;
    }

    public static function Charge($amount, $source)
    {
        $date = new DateTime();
        $date->add(new DateInterval('PT1M')); // Add 5 minutes
        $expires_at = $date->format(DateTime::ISO8601);
        $charge = OmiseCharge::create([
            'amount' => $amount,
            'currency' => 'thb',
            'return_uri' => 'http://localhost',
            'source' => $source,
            'expires_at' => $expires_at,
        ]);
        return $charge;
    }

    public static function ChargePaid($charge_id)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(OMISE_SECRET_KEY . ':'),
        ])->post("https://api.omise.co/charges/{$charge_id}/mark_as_paid");
        return $response;
    }

    public static function ChargeCreditCard($amount, $card_token)
    {
        $date = new DateTime();
        $date->add(new DateInterval('PT1M')); // Add 5 minutes
        $expires_at = $date->format(DateTime::ISO8601);

        $charge = OmiseCharge::create([
            'amount' => $amount,
            'currency' => 'thb',
            'return_uri' => 'http://localhost',
            'card' => $card_token,
            'expires_at' => $expires_at,

        ]);
        return $charge;
    }
}
