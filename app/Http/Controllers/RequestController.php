<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function sendRequest(Request $request)
    {

        $req = \App\Request::create([
            'longtitude' => $request->get('longtitude'),
            'latitude' => $request->get('latitude')
        ]);
        return response()->json([
            'request_id' => $req->id,
            'status' => 'success',
            'locations' =>
                [
                    [
                        'user_id' => '1',
                        'longtitude' => $request->get('longtitude'),
                        'latitude' => $request->get('latitude')
                    ],
                    [
                        'user_id' => '1',
                        'longtitude' => $request->get('longtitude'),
                        'latitude' => $request->get('latitude')
                    ],
                    [
                        'user_id' => '1',
                        'longtitude' => $request->get('longtitude'),
                        'latitude' => $request->get('latitude')
                    ]
                ]
        ]);
    }

    public function refreshRequest(Request $request)
    {
        $req = \App\Request::find($request->get('request_id'));
        if ($req->provider_id)
            return response()->json([
                'status' => 'success',
                'provider_location' => [
                    'user_id' => '1',
                    'longtitude' => $request->get('longtitude'),
                    'latitude' => $request->get('latitude')
                ]
            ]);
        else
            return response()->json([
                'status' => 'failed'
            ]);
    }

    public function acceptRequest(Request $request)
    {
        \App\Request::find($request->get('request_id'))->update([
            'provider_id' => $request->get('provider_id')
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
