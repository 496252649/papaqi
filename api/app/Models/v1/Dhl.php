<?php

namespace App\Models\v1;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string abbreviation
 * @property integer sort
 * @property integer state
 */
class Dhl extends Model
{
    public static $withoutAppends = true;
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
