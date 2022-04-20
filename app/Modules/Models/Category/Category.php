<?php

namespace App\Modules\Models\Category;

use App\Modules\Models\User\User;
use App\Modules\Models\SubCategory\SubCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $path = 'uploads/category';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'type', 'slug', 'description', 'image', 'visibility', 'image', 'color', 'order', 'status', 'availability', 'has_subcategory', 'created_by', 'last_updated_by', 'last_deleted_by', 'deleted_at'
    ];

    protected $appends = [
        'visibility_text', 'has_subcategory_text', 'status_text', 'availability_text', 'thumbnail_path', 'image_path'
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

    function getHasSubcategoryTextAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->has_subcategory));
    }

    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function getImagePathAttribute()
    {
        if ($this->image)
            return $this->path . '/' . $this->image;
        else
            return 'admin/media/misc/noimage.png';
    }

    function getThumbnailPathAttribute()
    {
        if ($this->image)
            return $this->path . '/thumb/' . $this->image;
        else
            return 'admin/media/misc/noimage.png';
    }

    function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
