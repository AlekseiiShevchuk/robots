<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreActionsRequest;
use App\Http\Requests\Admin\UpdateActionsRequest;

class ActionsController extends Controller
{
    /**
     * Display a listing of Action.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('action_access')) {
            return abort(401);
        }

        $actions = Action::all();

        return view('admin.actions.index', compact('actions'));
    }

    /**
     * Show the form for creating new Action.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('action_create')) {
            return abort(401);
        }
        return view('admin.actions.create');
    }

    /**
     * Store a newly created Action in storage.
     *
     * @param  \App\Http\Requests\StoreActionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActionsRequest $request)
    {
        if (! Gate::allows('action_create')) {
            return abort(401);
        }
        $action = Action::create($request->all());



        return redirect()->route('admin.actions.index');
    }


    /**
     * Show the form for editing Action.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('action_edit')) {
            return abort(401);
        }
        $action = Action::findOrFail($id);

        return view('admin.actions.edit', compact('action'));
    }

    /**
     * Update Action in storage.
     *
     * @param  \App\Http\Requests\UpdateActionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActionsRequest $request, $id)
    {
        if (! Gate::allows('action_edit')) {
            return abort(401);
        }
        $action = Action::findOrFail($id);
        $action->update($request->all());



        return redirect()->route('admin.actions.index');
    }


    /**
     * Display Action.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('action_view')) {
            return abort(401);
        }
        $localized_actions = \App\LocalizedAction::where('action_id', $id)->get();

        $action = Action::findOrFail($id);

        return view('admin.actions.show', compact('action', 'localized_actions'));
    }


    /**
     * Remove Action from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('action_delete')) {
            return abort(401);
        }
        $action = Action::findOrFail($id);
        $action->delete();

        return redirect()->route('admin.actions.index');
    }

    /**
     * Delete all selected Action at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('action_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Action::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
