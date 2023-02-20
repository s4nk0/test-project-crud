<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $request->authenticate();


        return response()->json([
            'success'=>true,
            'data'=>[
                'token'=>Auth::user()->createToken(Auth::user()->name)->plainTextToken,
                'user'=>Auth::user(),
            ],
            'message'=>'User logged in',
        ]);
    }
}
