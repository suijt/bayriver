<?php

namespace App\Modules\Models\Course;

use App\Modules\Models\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
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

    protected $path = 'uploads/course';

    protected $fillable = [
        'category_id', 'sub_category_id', 'country_id', 'title', 'slug', 'caption', 'description', 'duration', 'practicum_duration', 'study_option',
        'work_placement', 'credential', 'industrial_demand', 'expected_salary', 'professional_level',
        'program_type', 'learning_outcome', 'learning_features', 'prerequisite_desc',
        'prerequisite_subdesc', 'financial_desc', 'industrial_desc', 'video_link',
        'is_featured', 'is_program', 'is_affiliated', 'is_continious', 'is_international', 'image', 'secondary_image', 'banner_image', 'icon_image',
        'paralax_image', 'status', 'order', 'deleted_at', 'created_by', 'last_updated_by', 'last_deleted_by'
    ];
    protected $appends = [
        'thumbnail_path', 'image_path', 'secondary_image_path', 'banner_image_path', 'icon_image_path', 'paralax_image_path', 'status_text'
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
        return $this->path . '/' . $this->secondary_image;
    }

    function getBannerImagePathAttribute()
    {
        return $this->path . '/' . $this->banner_image;
    }

    function getIconImagePathAttribute()
    {
        return $this->path . '/' . $this->icon_image;
    }

    function getParalaxImagePathAttribute()
    {
        return $this->path . '/' . $this->paralax_image;
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
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
