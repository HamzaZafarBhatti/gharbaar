<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('user.login');
    }

    public function doLogin(Request $request)
    {
        // return $request;

        if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
            config(['auth.defaults.guard' => 'user']);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // config(['auth.guards.admin-api.driver' => 'session']);
        if (Auth::guard('user')->attempt($credentials)) {
            config(['auth.defaults.guard' => 'user']);
            config(['auth.guards.api.provider' => 'user']);
            // Authentication passed...
            $user = auth()->guard('user')->user();
            $token = $user->createToken($user->name, ['user'])->accessToken;
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
