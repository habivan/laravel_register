<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('verify-email');
    }
}
