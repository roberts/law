<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PrimaryOrganization extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_members';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('findprimary', function (Builder $builder) {
            $builder->whereIn('id', [DB::raw("(select min(`id`) from organization_members GROUP BY member_id)")]);
        });

    }

    /**
     * Get the status details of the current status.
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

}
