<?php

namespace Campusdigital\CampusCMS\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Campusdigital\CampusCMS\Models\SeoPage;
use Campusdigital\CampusCMS\Models\Kontributor;

class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_title', 'blog_permalink', 'blog_gambar', 'blog_kategori', 'blog_tag', 'blog_kontributor', 'konten', 'author', 'blog_at','seo_page_id'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function seoPage()
    {
        return $this->belongsTo(SeoPage::class, 'seo_page_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function kontributor()
    {
        return $this->belongsTo(Kontributor::class, 'blog_kontributor');
    }
}
