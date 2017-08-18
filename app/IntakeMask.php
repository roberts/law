<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntakeMask extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the intake form's client.
     */
    public function client()
    {
        return $this->belongsTo('App\Contact', 'client_id');
    }

    /**
     * Get the intake form's file.
     */
    public function file()
    {
        return $this->belongsTo('App\File', 'file_id');
    }

    /**
     * Get the creator of the intake form.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user that last updated the intake form.
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
