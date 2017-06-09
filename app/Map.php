<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Map
 *
 * @package App
 * @property text $settings
 * @property string $marker
 * @property string $marker_fset
 * @property string $marker_fset3
 * @property string $marker_iset
 * @property string $map_image
 */
class Map extends Model
{
    protected $fillable = ['settings', 'name'];
    protected $appends = [
        'title',
        'description',
        'sound_description',
        'marker_fset',
        'marker_fset3',
        'marker_iset'
    ];


    public function available_actions()
    {
        return $this->belongsToMany(Action::class, 'action_map');
    }

    public function localizations()
    {
        return $this->hasMany(LocalizedMap::class);
    }

    public function localization($language_id = null)
    {
        if ($language_id == null) {
            $language_id = Auth::user()->language_id ?? Language::where('abbreviation', 'en')->first()->id;
        }
        return $this->localizations()->where('language_id', $language_id)->first();
    }

    public function getTitleAttribute()
    {
        if ($this->localization() instanceof LocalizedMap) {
            return $this->localization()->title;
        }
        return null;
    }

    public function getDescriptionAttribute()
    {
        if ($this->localization() instanceof LocalizedMap) {
            return $this->localization()->description;
        }
        return null;
    }

    public function getSoundDescriptionAttribute()
    {
        if ($this->localization() instanceof LocalizedMap) {
            return $this->localization()->sound_description;
        }
        return null;
    }

    public function getMarkerFsetAttribute()
    {
        return env('APP_URL') . 'map_data/' . $this->id . '/marker.fset';
    }

    public function getMarkerFset3Attribute()
    {
        return env('APP_URL') . 'map_data/' . $this->id . '/marker.fset3';
    }

    public function getMarkerIsetAttribute()
    {
        return env('APP_URL') . 'map_data/' . $this->id . '/marker.iset';
    }

}
