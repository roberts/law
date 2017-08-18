<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Relation extends Pivot
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'relations';

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the creator of the file.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user that last updated the file.
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
