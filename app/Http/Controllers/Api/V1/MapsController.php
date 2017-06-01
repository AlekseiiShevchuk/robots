<?php

namespace App\Http\Controllers\Api\V1;

use App\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMapsRequest;
use App\Http\Requests\Admin\UpdateMapsRequest;

class MapsController extends Controller
{
    public function index()
    {
        return Map::all();
    }

    public function show($id)
    {
        return Map::findOrFail($id);
    }

    public function update(UpdateMapsRequest $request, $id)
    {
        $map = Map::findOrFail($id);
        $map->update($request->all());
        

        return $map;
    }

    public function store(StoreMapsRequest $request)
    {
        $map = Map::create($request->all());
        

        return $map;
    }

    public function destroy($id)
    {
        $map = Map::findOrFail($id);
        $map->delete();
        return '';
    }
}
