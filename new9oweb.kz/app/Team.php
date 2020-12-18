<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    protected $casts = [
        'custom_data' => 'array',
    ];
    public function setCustomDataAttribute($value)
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }
        if (empty($value)) {
            $value = array();
        }
        $this->attributes['custom_data'] = json_encode($value);
    }
}
