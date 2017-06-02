<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLanguagesRequest;
use App\Http\Requests\Admin\UpdateLanguagesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LanguagesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('language_access')) {
            return abort(401);
        }

        $languages = Language::all();

        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for editing Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);

        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update Language in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguagesRequest $request, $id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $language = Language::findOrFail($id);
        $language->update($request->all());



        return redirect()->route('admin.languages.index');
    }

}
