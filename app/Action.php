<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Action
 *
 * @package App
 * @property string $name
 */
class Action extends Model
{
    protected $fillable = ['name'];
    protected $appends = [
        'localized_name',
        'sound',
    ];
    protected $hidden = ['name'];

    public function localizations()
    {
        return $this->hasMany(LocalizedAction::class);
    }

    public function get_localization_id_or_false($language_id)
    {
        $localization = $this->localizations()->where('language_id', $language_id)->first();
        if ($localization instanceof LocalizedAction) {
            return $localization->id;
        }
        return false;
    }

    public function localization($language_id = null)
    {
        if ($language_id == null) {
            $language_id = Auth::user()->language_id ?? Language::where('abbreviation', 'en')->first()->id;
        }
        return $this->localizations()->where('language_id', $language_id)->first();
    }

    public function getLocalizedNameAttribute()
    {
        if ($this->localization() instanceof LocalizedAction) {
            return $this->localization()->name;
        }
        return null;
    }

    public function getSoundAttribute()
    {
        if ($this->localization() instanceof LocalizedAction) {
            return $this->localization()->sound;
        }
        return null;
    }
}
