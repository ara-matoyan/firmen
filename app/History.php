<?php

namespace Firmen;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
