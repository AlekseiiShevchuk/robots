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
        $map = Map::findOrFail($id)->load('available_actions')->makeHidden(['created_at', 'updated_at']);
        $map->available_actions->makeHidden(['created_at', 'updated_at', 'pivot']);
        return $map;
    }
}
