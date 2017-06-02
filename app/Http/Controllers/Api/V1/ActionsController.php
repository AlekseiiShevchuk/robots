<?php

namespace App\Http\Controllers\Api\V1;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreActionsRequest;
use App\Http\Requests\Admin\UpdateActionsRequest;

class ActionsController extends Controller
{
    public function index()
    {
        return Action::all();
    }

    public function show($id)
    {
        return Action::findOrFail($id);
    }

    public function update(UpdateActionsRequest $request, $id)
    {
        $action = Action::findOrFail($id);
        $action->update($request->all());
        

        return $action;
    }

    public function store(StoreActionsRequest $request)
    {
        $action = Action::create($request->all());
        

        return $action;
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();
        return '';
    }
}
