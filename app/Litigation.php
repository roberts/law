<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Litigation extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'case_number';
    }
    
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get a string path for the quote.
     *
     * @return string
     */
    public function path()
    {
        return "/litigation/{$this->case_number}";
    }

    /**
     * Get the creator of the case/lititgation.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user that last updated the case/lititgation.
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get all of the notes about the case/litigation.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

}
