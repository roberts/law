<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model
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
     * Get the creator of the relation.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user that last updated the relation.
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get the file for this relation.
     */
    public function file()
    {
        return $this->belongsTo('App\File');
    }

    /**
     * Get the entity for this relation.
     */
    public function entity()
    {
        return $this->belongsTo('App\Contact', 'related_id');
    }

    /**
     * Get the client for this relation.
     */
    public function client()
    {
        return $this->belongsTo('App\Contact', 'client_id');
    }
}
