<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return 'reference_number';
    }
    
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get a string path for the litigation.
     *
     * @return string
     */
    public function path()
    {
        return "/files/{$this->filetype->slug}/litigation/{$this->reference_number}";
    }

    /**
     * Get the file type for the case/litigation.
     */
    public function filetype()
    {
        return $this->belongsTo('App\FileType', 'file_type_id');
    }

    /**
     * Get the files for the case/litigation.
     */
    public function files()
    {
        return $this->hasMany('App\File');
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
