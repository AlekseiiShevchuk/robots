<?php

namespace App\Http\Controllers\Admin;

use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMapsRequest;
use App\Http\Requests\Admin\UpdateMapsRequest;

class MapsController extends Controller
{
    /**
     * Display a listing of Map.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('map_access')) {
            return abort(401);
        }

        $maps = Map::all();

        return view('admin.maps.index', compact('maps'));
    }

    /**
     * Show the form for creating new Map.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('map_create')) {
            return abort(401);
        }
        return view('admin.maps.create');
    }

    /**
     * Store a newly created Map in storage.
     *
     * @param  \App\Http\Requests\StoreMapsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMapsRequest $request)
    {
        if (! Gate::allows('map_create')) {
            return abort(401);
        }
        $map = Map::create($request->all());



        return redirect()->route('admin.maps.index');
    }


    /**
     * Show the form for editing Map.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('map_edit')) {
            return abort(401);
        }
        $map = Map::findOrFail($id);

        return view('admin.maps.edit', compact('map'));
    }

    /**
     * Update Map in storage.
     *
     * @param  \App\Http\Requests\UpdateMapsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMapsRequest $request, $id)
    {
        if (! Gate::allows('map_edit')) {
            return abort(401);
        }
        $map = Map::findOrFail($id);
        $map->update($request->all());



        return redirect()->route('admin.maps.index');
    }


    /**
     * Display Map.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('map_view')) {
            return abort(401);
        }
        $localized_maps = \App\LocalizedMap::where('map_id', $id)->get();

        $map = Map::findOrFail($id);

        return view('admin.maps.show', compact('map', 'localized_maps'));
    }


    /**
     * Remove Map from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('map_delete')) {
            return abort(401);
        }
        $map = Map::findOrFail($id);
        $map->delete();

        return redirect()->route('admin.maps.index');
    }

    /**
     * Delete all selected Map at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('map_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Map::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
