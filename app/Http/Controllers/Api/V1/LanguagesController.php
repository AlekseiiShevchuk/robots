<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Language;
use App\TranslationItem;
use Illuminate\Database\Eloquent\Collection;

class LanguagesController extends Controller
{

    public function index()
    {
        $langCollection = new Collection();
        $languages = Language::isActiveForUsers()->makeHidden([
            'created_at',
            'updated_at',
            'is_active_for_admin',
            'is_active_for_users'
        ]);
        $translations = TranslationItem::all();

        // convert Models for frontend needs
        foreach ($languages as $language) {
            $item = ['language' => $language->abbreviation];
            foreach ($translations as $translation) {
                $value = 'value_' . $language->abbreviation;
                $item['translations'][] = [$translation->value_name => $translation->$value];
            }
            $langCollection->add($item);
        }

        return $langCollection;
    }

}
