<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocalizedMap
 *
 * @package App
 * @property string $map
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $sound_description
*/
class LocalizedMap extends Model
{
    protected $fillable = ['title', 'description', 'sound_description', 'map_id', 'language_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMapIdAttribute($input)
    {
        $this->attributes['map_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLanguageIdAttribute($input)
    {
        $this->attributes['language_id'] = $input ? $input : null;
    }
    
    public function map()
    {
        return $this->belongsTo(Map::class, 'map_id');
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    
}
