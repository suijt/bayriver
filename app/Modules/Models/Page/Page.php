<?php

namespace App\Modules\Models\Page;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $path = 'uploads/page';
    protected $fillable = [
        'name', 'slug', 'meta_title', 'meta_description',
        'title', 'short_description', 'description', 'deleted_at', 'image', 'banner_image',
        'status', 'quick_links', 'footer_1', 'footer_2'
    ];
    protected $appends = [
        'thumbnail_path', 'image_path', 'banner_path', 'status_text'
    ];
    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function getStatusTextAttribute()
    {
        return ucwords(str_replace('_', '', $this->status));
    }
    function getQuickTextAttribute()
    {
        return ucwords(str_replace('_', '', $this->feature));
    }

    function getImagePathAttribute()
    {
        if ($this->image)
            return $this->path . '/'  . $this->image;
        else
            return 'admin/media/misc/noimage.png';
    }

    function getBannerPathAttribute()
    {
        if ($this->banner_image)
            return $this->path . '/' . $this->banner_image;
        else
            return 'admin/media/misc/noimage.png';
    }
    function getThumbnailPathAttribute()
    {
        if ($this->image)
            return $this->path .  '/thumb/' . $this->image;
        else
            return 'admin/media/misc/noimage.png';
    }
}
