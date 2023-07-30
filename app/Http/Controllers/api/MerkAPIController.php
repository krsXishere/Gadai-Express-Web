<?php

namespace App\Http\Controllers\api;

use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use App\Models\Merk;

class MerkAPIController extends Controller
{
    public function index()
    {
        $merk = Merk::all();

        if ($merk) {
            return APIFormatter::createAPI(200, 'Success', $merk);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
