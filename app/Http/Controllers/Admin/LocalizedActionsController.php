<?php

namespace App\Http\Controllers\Admin;

use App\LocalizedAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalizedActionsRequest;
use App\Http\Requests\Admin\UpdateLocalizedActionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocalizedActionsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of LocalizedAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('localized_action_access')) {
            return abort(401);
        }

        $localized_actions = LocalizedAction::all();

        return view('admin.localized_actions.index', compact('localized_actions'));
    }

    /**
     * Show the form for creating new LocalizedAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('localized_action_create')) {
            return abort(401);
        }
        $languages = \App\Language::isActiveForAdmin()->pluck('name', 'id')->prepend('Please select', '');$actions = \App\Action::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.localized_actions.create', compact('languages', 'actions'));
    }

    /**
     * Store a newly created LocalizedAction in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreLocalizedActionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalizedActionsRequest $request)
    {
        if (! Gate::allows('localized_action_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $localized_action = LocalizedAction::create($request->all());



        return redirect()->route('admin.localized_actions.index');
    }


    /**
     * Show the form for editing LocalizedAction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('localized_action_edit')) {
            return abort(401);
        }
        $languages = \App\Language::isActiveForAdmin()->pluck('name', 'id')->prepend('Please select', '');$actions = \App\Action::get()->pluck('name', 'id')->prepend('Please select', '');

        $localized_action = LocalizedAction::findOrFail($id);

        return view('admin.localized_actions.edit', compact('localized_action', 'languages', 'actions'));
    }

    /**
     * Update LocalizedAction in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateLocalizedActionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalizedActionsRequest $request, $id)
    {
        if (! Gate::allows('localized_action_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $localized_action = LocalizedAction::findOrFail($id);
        $localized_action->update($request->all());



        return redirect()->route('admin.localized_actions.index');
    }


    /**
     * Display LocalizedAction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('localized_action_view')) {
            return abort(401);
        }
        $localized_action = LocalizedAction::findOrFail($id);

        return view('admin.localized_actions.show', compact('localized_action'));
    }


    /**
     * Remove LocalizedAction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('localized_action_delete')) {
            return abort(401);
        }
        $localized_action = LocalizedAction::findOrFail($id);
        $localized_action->delete();

        return redirect()->route('admin.localized_actions.index');
    }

    /**
     * Delete all selected LocalizedAction at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('localized_action_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = LocalizedAction::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
