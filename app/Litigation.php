<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Litigation extends Model
{
	
	
    /**
     * Get all of the notes about the case/litigation.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

}
