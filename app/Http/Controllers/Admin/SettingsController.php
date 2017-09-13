<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingsRequest;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingsController extends Controller
{
    /**
     * Display a listing of Setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('setting_access')) {
            return abort(401);
        }

        $settings = Setting::all();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating new Setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('setting_create')) {
            return abort(401);
        }
        $enum_type = Setting::$enum_type;

        return view('admin.settings.create', compact('enum_type'));
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param  \App\Http\Requests\StoreSettingsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingsRequest $request)
    {
        if (!Gate::allows('setting_create')) {
            return abort(401);
        }
        $setting = Setting::create($request->all());


        return redirect()->route('admin.settings.index');
    }


    /**
     * Show the form for editing Setting.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('setting_edit')) {
            return abort(401);
        }
        $enum_type = Setting::$enum_type;

        $setting = Setting::findOrFail($id);

        return view('admin.settings.edit', compact('setting', 'enum_type'));
    }

    /**
     * Update Setting in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request, $id)
    {
        if (!Gate::allows('setting_edit')) {
            return abort(401);
        }
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());


        return redirect()->route('admin.settings.index');
    }


    /**
     * Remove Setting from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('setting_delete')) {
            return abort(401);
        }
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index');
    }

    /**
     * Delete all selected Setting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Setting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
