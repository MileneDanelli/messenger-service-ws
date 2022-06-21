<?php

namespace App\Http\Controllers;

use App\Jobs\ReturnNotification;
use App\Models\Data;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request) {
        $data = [];
        $data['hash'] = $request->hash;
        $data['app1_id'] = $request->id;

        $response = Data::create($data);

        broadcast(new ReturnNotification($response));

        return response()->json($response);
    }
}
