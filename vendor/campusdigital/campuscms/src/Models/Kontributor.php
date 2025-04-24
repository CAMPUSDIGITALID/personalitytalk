<?php

namespace Campusdigital\CampusCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Campusdigital\CampusCMS\Models\Blog;

class Kontributor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kontributor';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_kontributor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kontributor', 'slug'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
