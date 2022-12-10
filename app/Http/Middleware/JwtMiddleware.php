<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof TokenExpiredException) {
                $response = [
                    'success' => false,
                    'message' => 'Token is expired'
                ];
                return response()->json($response, 401);
            } else if ($e instanceof TokenInvalidException) {
                $response = [
                    'success' => false,
                    'message' => 'Token is Invalid'
                ];
                return response()->json($response, 401);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Authorization Token not found'
                ];
                return response()->json($response, 401);
            }
        }

        return $next($request);
    
    }
}
