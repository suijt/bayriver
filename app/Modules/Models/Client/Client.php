<?php

namespace App\Modules\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $path = 'uploads/client';

    protected $fillable = [
        'title', 'caption', 'description', 'button_text', 'button_link', 'image', 'status','order',
        'deleted_at', 'created_by', 'last_updated_by', 'last_deleted_by'
    ];
    protected $appends = [
        'thumbnail_path', 'image_path', 'status_text'
    ];

    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
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
