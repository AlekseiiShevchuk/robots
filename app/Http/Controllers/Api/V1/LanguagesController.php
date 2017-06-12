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
            $item = ['language' => $language->abbreviation, 'flag_image' => $language->flag_image];
            foreach ($translations as $translation) {
                $value = 'value_' . $language->abbreviation;
                $item['translations'][] = ['key' => $translation->value_name, 'value' => $translation->$value];
            }
            $langCollection->add($item);
        }

        return $langCollection;
    }

}
