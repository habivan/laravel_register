<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;;

use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        $request->fulfill();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
