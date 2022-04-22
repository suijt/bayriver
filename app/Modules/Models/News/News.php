<?php

namespace App\Modules\Models\News;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $path = 'uploads/news';

    protected $fillable = [
        'title', 'caption', 'description', 'slug', 'image', 'banner_image', 'icon_image', 'status', 'order', 'is_featured', 'is_event', 'event_date',
        'is_headline', 'deleted_at', 'created_by', 'last_updated_by', 'last_deleted_by'
    ];
    protected $appends = [
        'thumbnail_path', 'image_path', 'status_text', 'banner_image_path', 'icon_image_path'
    ];

    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }


    function getBannerImagePathAttribute()
    {
        return $this->path . '/' . $this->banner_image;
    }

    function getIconImagePathAttribute()
    {
        return $this->path . '/' . $this->icon_image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    function getStatusTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->status));
    }
}
