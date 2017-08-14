<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    /**
     * Get the files for the file type.
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }
}
