<?php

namespace Campusdigital\CampusCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Campusdigital\CampusCMS\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeoPage extends Model
{
    use HasFactory;

    protected $table = 'seo_page';
    protected $guarded = [''];

    public $timestamps = false;

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
