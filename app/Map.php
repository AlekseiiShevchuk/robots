<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Map
 *
 * @package App
 * @property text $settings
*/
class Map extends Model
{
    protected $fillable = ['settings', 'name'];

    public function available_actions()
    {
        return $this->belongsToMany(Action::class, 'action_map');
    }
    
    
}
