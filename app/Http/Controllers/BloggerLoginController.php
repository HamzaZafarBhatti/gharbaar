<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloggerLoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('blogger.login');
    }

    public function doLogin(Request $request)
    {
        // return $request;

        if (Auth::guard('blogger')->attempt($request->only('email', 'password'))) {
            config(['auth.defaults.guard' => 'blogger']);
            return redirect()->route('blogger.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function bloggerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // config(['auth.guards.admin-api.driver' => 'session']);
        if (Auth::guard('blogger')->attempt($credentials)) {
            config(['auth.defaults.guard' => 'blogger']);
            config(['auth.guards.api.provider' => 'blogger']);
            // Authentication passed...
            $user = auth()->guard('blogger')->user();
            $token = $user->createToken($user->name, ['blogger'])->accessToken;
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
