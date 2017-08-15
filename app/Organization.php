<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Organization extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orgs', function (Builder $builder) {
            $builder->where('type_id', '>', 2);
        });
    }

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
        return 'slug';
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
        return "/contacts/organizations/{$this->slug}";
    }

    /**
     * Get the files where the organization is the counsel.
     */
    public function files()
    {
        return $this->hasMany('App\File', 'counsel');
    }

    /**
     * Get all of the notes about the organization.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

}
