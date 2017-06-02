<?php

namespace App\Http\Controllers\Admin;

use App\LocalizedMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalizedMapsRequest;
use App\Http\Requests\Admin\UpdateLocalizedMapsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocalizedMapsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of LocalizedMap.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('localized_map_access')) {
            return abort(401);
        }

        $localized_maps = LocalizedMap::all();

        return view('admin.localized_maps.index', compact('localized_maps'));
    }

    /**
     * Show the form for creating new LocalizedMap.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('localized_map_create')) {
            return abort(401);
        }
        $maps = \App\Map::get()->pluck('settings', 'id')->prepend('Please select', '');$languages = \App\Language::isActiveForAdmin()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.localized_maps.create', compact('maps', 'languages'));
    }

    /**
     * Store a newly created LocalizedMap in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreLocalizedMapsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalizedMapsRequest $request)
    {
        if (! Gate::allows('localized_map_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $localized_map = LocalizedMap::create($request->all());



        return redirect()->route('admin.localized_maps.index');
    }


    /**
     * Show the form for editing LocalizedMap.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('localized_map_edit')) {
            return abort(401);
        }
        $maps = \App\Map::get()->pluck('settings', 'id')->prepend('Please select', '');$languages = \App\Language::isActiveForAdmin()->pluck('name', 'id')->prepend('Please select', '');

        $localized_map = LocalizedMap::findOrFail($id);

        return view('admin.localized_maps.edit', compact('localized_map', 'maps', 'languages'));
    }

    /**
     * Update LocalizedMap in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateLocalizedMapsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalizedMapsRequest $request, $id)
    {
        if (! Gate::allows('localized_map_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $localized_map = LocalizedMap::findOrFail($id);
        $localized_map->update($request->all());



        return redirect()->route('admin.localized_maps.index');
    }


    /**
     * Display LocalizedMap.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('localized_map_view')) {
            return abort(401);
        }
        $localized_map = LocalizedMap::findOrFail($id);

        return view('admin.localized_maps.show', compact('localized_map'));
    }


    /**
     * Remove LocalizedMap from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('localized_map_delete')) {
            return abort(401);
        }
        $localized_map = LocalizedMap::findOrFail($id);
        $localized_map->delete();

        return redirect()->route('admin.localized_maps.index');
    }

    /**
     * Delete all selected LocalizedMap at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('localized_map_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = LocalizedMap::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
