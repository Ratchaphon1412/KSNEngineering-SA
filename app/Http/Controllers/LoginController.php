<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller  implements LoginResponseContract, TwoFactorLoginResponseContract
{
    //
    public function toResponse($request)
    {
        // $home = auth()->user()->hasRole('admin') ? '/admin' : '/dashboard';

        $home = '/dashboard';
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                $home = '/admin';
            } elseif (Auth::user()->hasRole('technician')) {
                $home = '/list-repair';
            } elseif (Auth::user()->hasRole('sale')) {
                $home = '/list-repair';
            } else {
                $home = '/dashboard';
            }
        }



        return redirect()->intended($home);
    }
}
