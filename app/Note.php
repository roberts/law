<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the owning notable models.
     */
    public function notable()
    {
        return $this->morphTo();
    }

    /**
     * Get the creator of the note.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user that last updated the note.
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
