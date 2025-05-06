<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{

    use AuthenticatesUsers{
        sendFailedLoginResponse as superSendFailedLoginResponse;
    }
    protected $redirectTo = '/';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        flash('Sorry! Please try again.', 'danger');
        return $this->superSendFailedLoginResponse($request);
    }
}
