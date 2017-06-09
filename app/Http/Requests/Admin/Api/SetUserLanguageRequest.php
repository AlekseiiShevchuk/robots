<?php

namespace App\Http\Requests\Admin\Api;

use App\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetUserLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'language' => ['required', Rule::in(Language::isActiveForUsers(['abbreviation'])->pluck('abbreviation')->toArray())]
        ];
    }
}