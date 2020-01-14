<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Route;
class AdminLoginController extends Controller
{
  // use AuthenticatesUsers;

// protected $redirectTo = '/admin/home';
//
// /**
//  **_ Create a new controller instance.
//
//  **_ @return void
// */
// public function __construct()
// {
//   $this->middleware('guest')->except('logout');
// }
// /*
//
//  @return property guard use for login
//
//  */
// public function guard()
// {
//  return Auth::guard('admin');
// }
//
// // login from for teacher
// public function showLoginForm()
// {
//     return view('auth.admin-login');
// }
public function __construct()
{
  // $this->middleware('guest:admin', ['except' => ['logout']]);//مربوط به آموزش
   $this->middleware('guest:admin')->except('logout');
}

public function showLoginForm()
{
  return view('auth.admin-login');
}

public function login(Request $request)
{
  // Validate the form data
  $this->validate($request, [
    'email'   => 'required|email',
    'password' => 'required|min:6'
  ]);

  // Attempt to log the user in
  if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    // if successful, then redirect to their intended location
    return redirect(route('adminDashboard'));

  }
  // if unsuccessful, then redirect back to the login with the form data
  return redirect()->back()->withInput($request->only('email', 'remember'));

}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect(route('admin.login'));
}

}//end class
