<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The files that belong to the status.
     */
    public function files()
    {
        return $this->belongsToMany('App\File')->whereNull('file_status.deleted_at')->withPivot('created_by', 'created_at', 'deleted_at');
    }

    /**
     * A status may have children statuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function children() {
	    return $this->hasMany(Status::class, 'parent');
	}
	public function parent() {
	    return $this->belongsTo(Status::class, 'parent');
	}
}
