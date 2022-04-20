<?php

namespace App\Modules\Models\Country;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $path = 'uploads/country';

    protected $fillable = [
        'title', 'slug', 'caption', 'dli_no', 'description',
        'learning_outcome', 'learning_features', 'course_desc',
        'financial_desc', 'handbook_desc', 'handbook_file', 'video_link',
        'is_featured', 'image', 'secondary_image', 'banner_image',
        'status', 'order', 'deleted_at', 'created_by', 'last_updated_by', 'last_deleted_by'
    ];
    protected $appends = [
        'thumbnail_path', 'image_path', 'secondary_image_path', 'banner_image_path', 'handbook_file_path', 'status_text'
    ];

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function getSecondaryImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getBannerImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getHandbookFilePathAttribute()
    {
        return $this->path . '/' . $this->handbook_file;
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
