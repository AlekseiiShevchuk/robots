<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocalizedAction
 *
 * @package App
 * @property string $language
 * @property string $action
 * @property string $name
 * @property string $sound
*/
class LocalizedAction extends Model
{
    protected $fillable = ['name', 'sound', 'language_id', 'action_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLanguageIdAttribute($input)
    {
        $this->attributes['language_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setActionIdAttribute($input)
    {
        $this->attributes['action_id'] = $input ? $input : null;
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    
    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id');
    }
    
}
