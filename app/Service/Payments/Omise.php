<?php

namespace App\Service\Payments;

use OmiseTransaction;
use OmiseBalance;

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
}
