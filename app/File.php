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
    protected $dates = ['deleted_at'];

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
     * Get a string path for the quote.
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
        return $this->belongsTo('App\Organization', 'counsel');
    }

    /**
     * Get the file type.
     */
    public function filetype()
    {
        return $this->belongsTo('App\FileType', 'file_type_id');
    }

    /**
     * The clients that belong to the file.
     */
    public function clients()
    {
        return $this->belongsToMany('App\Contact', $this->filetype->db_table, 'file_id', 'client_id');
    }

    /**
     * The statuses that belong to the file.
     */
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->whereNull('file_status.deleted_at')->withPivot('created_by', 'created_at', 'deleted_at');
    }
    public function latestStatus()
    {
      return $this->statuses()->latest();
    }

    /**
     * Get the litigation case for the file.
     */
    public function litigation()
    {
        return $this->belongsTo('App\Case', 'case_id');
    }

    /**
     * Get the creator of the file.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the creator of the file.
     */
    public function latestUpdater()
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
 

}
