<?php

namespace App\Http\Controllers\Api\V1;

use App\LocalizedAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalizedActionsRequest;
use App\Http\Requests\Admin\UpdateLocalizedActionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocalizedActionsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return LocalizedAction::all();
    }

    public function show($id)
    {
        return LocalizedAction::findOrFail($id);
    }

    public function update(UpdateLocalizedActionsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $localized_action = LocalizedAction::findOrFail($id);
        $localized_action->update($request->all());
        

        return $localized_action;
    }

    public function store(StoreLocalizedActionsRequest $request)
    {
        $request = $this->saveFiles($request);
        $localized_action = LocalizedAction::create($request->all());
        

        return $localized_action;
    }

    public function destroy($id)
    {
        $localized_action = LocalizedAction::findOrFail($id);
        $localized_action->delete();
        return '';
    }
}
