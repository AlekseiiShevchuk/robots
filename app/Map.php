<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Map
 *
 * @package App
 * @property text $settings
*/
class Map extends Model
{
    protected $fillable = ['settings', 'name'];
    protected $appends = ['title', 'description', 'sound_description'];
    

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
        if($language_id == null){
            $language_id = Auth::user()->language_id ?? Language::where('abbreviation', 'en')->first()->id;
        }
        return $this->localizations()->where('language_id', $language_id)->first();
    }

    public function getTitleAttribute()
    {
        if ($this->localization() instanceof LocalizedMap){
            return $this->localization()->title;
        }
        return null;
    }

    public function getDescriptionAttribute()
    {
        if ($this->localization() instanceof LocalizedMap){
            return $this->localization()->description;
        }
        return null;
    }

    public function getSoundDescriptionAttribute()
    {
        if ($this->localization() instanceof LocalizedMap){
            return $this->localization()->sound_description;
        }
        return null;
    }
    
}
