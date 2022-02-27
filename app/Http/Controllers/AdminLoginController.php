<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        // return $request;

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            config(['auth.defaults.guard' => 'admin']);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // config(['auth.guards.admin-api.driver' => 'session']);
        if (Auth::guard('admin')->attempt($credentials)) {
            config(['auth.defaults.guard' => 'admin']);
            config(['auth.guards.api.provider' => 'admin']);
            // Authentication passed...
            $user = auth()->guard('admin')->user();
            $token = $user->createToken($user->name, ['admin'])->accessToken;
            $user->access_token = $token;
            $user->makeHidden('password');

            $response = $user;
            // return $response;
        } else {
            $response = [
                'status' => false,
                'msg' => 'Invalid username or password!'
            ];
        }
        return response()->json($response, 200);
    }
}
