<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Api\SetUserLanguageRequest;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UserController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        return $this->makeFieldsHidden($user);
    }

    public function updateProfile(SetUserLanguageRequest $request)
    {
        if(!(Language::where('abbreviation', $request->get('language'))->first() instanceof Language)){
            throw new BadRequestHttpException('Invalid iso code');
        }
        $user = Auth::user();
        $user->language_id = Language::where('abbreviation', $request->get('language'))->first()->id;
        $user->save();
        return $this->makeFieldsHidden($user);
    }

    private function makeFieldsHidden($user)
    {
        $user->makeHidden([
            'id',
            'name',
            'email',
            'password',
            'role_id',
            'remember_token',
            'created_at',
            'updated_at'
        ])->load(['language']);
        $user->language->makeHidden([
            'is_active_for_admin',
            'is_active_for_users',
            'created_at',
            'updated_at'
        ]);
        return $user;
    }
}
