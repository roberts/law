<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileType extends Model
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
        return 'slug';
    }

    /**
     * Get a string path for the quote.
     *
     * @return string
     */
    public function path()
    {
        return "/files/{$this->slug}";
    }

    /**
     * Get the files for the file type.
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }
}
