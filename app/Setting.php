<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @package App
 * @property string $value_name
 * @property string $value
 * @property enum $type
 */
class Setting extends Model
{
    public static $enum_type = ["string" => "String", "number" => "Number"];
    public $timestamps = false;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    protected $primaryKey = 'value_name';
    protected $fillable = ['value_name', 'value', 'type'];

    public static function getValue($name)
    {
        $value = self::findOrFail($name);

        if ($value->type == 'string') {
            return (string)$value->value;
        }
        if ($value->type == 'number') {
            return (int)$value->value;
        }
    }

}
