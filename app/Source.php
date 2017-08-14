<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    /**
     * Get the files for the source.
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }
}
