<?php

namespace App\Http\Controllers\Api\V1;

use App\LocalizedMap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalizedMapsRequest;
use App\Http\Requests\Admin\UpdateLocalizedMapsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocalizedMapsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return LocalizedMap::all();
    }

    public function show($id)
    {
        return LocalizedMap::findOrFail($id);
    }

    public function update(UpdateLocalizedMapsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $localized_map = LocalizedMap::findOrFail($id);
        $localized_map->update($request->all());
        

        return $localized_map;
    }

    public function store(StoreLocalizedMapsRequest $request)
    {
        $request = $this->saveFiles($request);
        $localized_map = LocalizedMap::create($request->all());
        

        return $localized_map;
    }

    public function destroy($id)
    {
        $localized_map = LocalizedMap::findOrFail($id);
        $localized_map->delete();
        return '';
    }
}
