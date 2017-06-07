<?php

namespace App\Http\Controllers\Api\V1;

use App\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMapsRequest;
use App\Http\Requests\Admin\UpdateMapsRequest;

class MapsController extends Controller
{

    public function show($id)
    {
        return Map::findOrFail($id);
    }
}
