<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {
    public function login( Request $request ) {
        $credentials = $request->only( 'email', 'password' );

        try {
            if ( !$token = JWTAuth::attempt( $credentials ) ) {
                return response()->json( [ 'error' => 'Invalid credentials' ], 401 );
            }
        } catch ( JWTException $e ) {
            return response()->json( [ 'error' => 'Could not create token' ], 500 );
        }

        return response()->json( [ 'token' => $token ] );
    }

}
