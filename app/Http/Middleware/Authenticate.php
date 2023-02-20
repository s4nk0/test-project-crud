<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!Log::info('Authenticated User: ' . Auth::guard('api')->user())){
            return response()->json([
                'success'=>false,
                'message'=>'Unauthorized',
            ]);

        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
