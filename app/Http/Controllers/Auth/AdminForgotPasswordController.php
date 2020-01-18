<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;
class AdminForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
        protected function broker()
    {
        return Password::broker('admins');
    }
    /**
    * Display the form to request a password reset link.
    *
    * @return \Illuminate\Http\Response
    */
    public function showLinkRequestForm()
    {
      return view('auth.passwords.admin_email');
    }
}//end class
