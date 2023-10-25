<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use Illuminate\Http\Request;

class LoginController extends Controller  implements LoginResponseContract, TwoFactorLoginResponseContract
{
    //
    public function toResponse($request)
    {
        $home = auth()->user()->hasRole('admin') ? '/admin' : '/dashboard';

        return redirect()->intended($home);
    }
}
