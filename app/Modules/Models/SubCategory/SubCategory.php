<?php

namespace App\Modules\Models\SubCategory;

use App\Modules\Models\Category\Category;
use App\Modules\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use Sluggable;
    protected $path = 'uploads/subcategory';
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'keywords', 'image', 'visibility', 'status', 'availability', 'has_groups', 'input_type', 'is_deleted',
        'deleted_at', 'created_by', 'last_updated_by', 'last_deleted_by'
    ];
    protected $appends = [
        'visibility_text', 'has_groups_text', 'status_text', 'availability_text', 'thumbnail_path', 'image_path'
    ];

    function getVisibilityTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->visibility));
    }

    function getStatusTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->status));
    }
    function getAvailabilityTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->availability));
    }
    function getInputTypeTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->input_type));
    }

    function getHasGroupsTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->has_groups));
    }
    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
