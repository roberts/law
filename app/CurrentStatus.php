<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CurrentStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file_status';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('findcurrent', function (Builder $builder) {
            $builder->whereIn('id', [DB::raw("(select max(`id`) from file_status WHERE deleted_at IS NULL GROUP BY file_id)")]);
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
     * Get the status details of the current status.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
