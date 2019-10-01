<?php

namespace Firmen;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    
    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class);
    }

    public function histories() 
    {
        return $this->hasMany(History::class);
    }
}


