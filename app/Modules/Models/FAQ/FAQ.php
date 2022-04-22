<?php

namespace App\Modules\Models\FAQ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['questions','answer','deleted_at'];

}
