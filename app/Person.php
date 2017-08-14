<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
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

        static::addGlobalScope('people', function (Builder $builder) {
            $builder->where('type_id', '<', 3);
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
        return "/contacts/persons/{$this->slug}";
    }

    /**
     * Get the user that is the person.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The organizations to which the person belongs.
     */
    public function organizations()
    {
        return $this->belongsToMany('App\Organization', 'organization_members', 'member_id', 'organization_id');
    }
    public function primaryOrganization()
    {
      return $this->organizations()->first();
    }
}
