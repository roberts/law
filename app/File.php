<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['sol', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'file_number';
    }
    
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get a string path for the file.
     *
     * @return string
     */
    public function path()
    {
        return "/files/{$this->filetype->slug}/{$this->file_number}";
    }

    /**
     * Get the main counsel for the file.
     */
    public function counsel()
    {
        return $this->belongsTo('App\Organization', 'counsel_id');
    }

    /**
     * Get the file type.
     */
    public function filetype()
    {
        return $this->belongsTo('App\FileType', 'file_type_id');
    }

    /**
     * Get the file's client intake forms from the intake model corresponding to the file.
     */
    public function intakes()
    {
        return $this->hasMany($this->filetype->model);
    }

    /**
     * The clients that belong to the file.
     */
    public function clients()
    {
        return $this->belongsToMany('App\Contact', $this->filetype->db_table, 'file_id', 'client_id');
    }

    /**
     * The file's relations.
     */
    public function relations()
    {
        return $this->belongsToMany('App\Contact', 'relations', 'file_id', 'related_id')->withPivot('relationship_id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at');
    }

    /**
     * The defendants that belong to the file.
     */
    public function defendants()
    {
        return $this->belongsToMany('App\Contact', 'relations', 'file_id', 'related_id')->wherePivot('relationship_id', 1)->withPivot('relationship_id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at');
    }

    /**
     * The statuses that belong to the file.
     */
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->whereNull('file_status.deleted_at')->withPivot('created_by', 'created_at', 'deleted_at');
    }
    
    // Category model
    public function current()
    {
      return $this->hasOne('App\CurrentStatus');
    }

    /**
     * Scope a query to only include files with current status as a lead.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFileleads($query)
    {
        return $query->whereHas('current.status', function($q){
                        $q->where('parent', '=', 1);
                      })->orderBy('updated_at', 'DESC');
    }
    
    /**
     * Scope a query to only include files with current status as pre-litigation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePrelitigationfiles($query)
    {
        return $query->whereHas('current.status', function($q){
                        $q->where('parent', '=', 2);
                      })->orderBy('updated_at', 'DESC');
    }

    /**
     * Scope a query to only include files with current status in Litigation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLitigationfiles($query)
    {
        return $query->whereHas('current.status', function($q){
                        $q->where('parent', '=', 3);
                      })->orderBy('updated_at', 'DESC');
    }

    /**
     * Scope a query to only include files with current status in Litigation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClosedfiles($query)
    {
        return $query->whereHas('current.status', function($q){
                        $q->where('parent', '=', 4);
                      })->orderBy('updated_at', 'DESC');
    }

    /**
     * Get the litigation case for the file.
     */
    public function litigation()
    {
        return $this->belongsTo('App\Litigation');
    }

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

    /**
     * Get the source of the file.
     */
    public function source()
    {
        return $this->belongsTo('App\Source');
    }

    /**
     * Get the referral contact of the file.
     */
    public function referrer()
    {
        return $this->belongsTo('App\Contact', 'referral_id');
    }

    /**
     * Get all of the notes about the file.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

    /**
     * The co-counsels that belong to the file.
     */
    public function cocounsels()
    {
        return $this->belongsToMany('App\Organization', 'relations', 'file_id', 'related_id')->wherePivot('relationship_id', 2)->withPivot('relationship_id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at');
    }

    /**
     * The co-workers that belong to the file's client.
     */
    public function coworkers()
    {
        return $this->belongsToMany('App\Person', 'relations', 'file_id', 'related_id')->wherePivot('relationship_id', 3)->withPivot('relationship_id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at');
    }

    /**
     * The family that belong to the file's client.
     */
    public function family()
    {
        return $this->belongsToMany('App\Person', 'relations', 'file_id', 'related_id')->wherePivot('relationship_id', 4)->withPivot('relationship_id', 'client_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at');
    }
 

}
