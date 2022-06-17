<?php

namespace App\Http\Controllers;

use App\Jobs\SaveData;
use App\Models\Data;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request) {
        $data = [];
        $data['hash'] = $request->hash;

        $response = Data::create($data);

        return response()->json($response);
    }
}
