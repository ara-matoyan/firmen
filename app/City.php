<?php

namespace Firmen;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function praktikum()
    {
        return $this->belongsToMany('Firmen\Praktikum');
    }
}
