<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeepSeekController extends Controller {
    public function ask( Request $request ) {

        $request -> validation( [
            'qustion' => 'requierd'|'string',      // this is the missing part on thr frontend
        ] );

        $response = Http::withHeaders( [
            'Authorization' => 'Bearer ' . env( 'DEEPSEEK_API_KEY' ),
            'Content-Type'  => 'application/json',
        ] )->post( 'https://api.deepseek.com/v1/chat/completions', [
            'model' => 'deepseek-chat',
            'messages' => [
                [ 'role' => 'user', 'content' => $request->question ]
            ]
        ] );

        return response()->json( [
            'response' => $response->json(),
        ] );
    }
}
