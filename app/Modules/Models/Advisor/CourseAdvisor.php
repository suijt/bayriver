<?php

namespace App\Modules\Models\Advisor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAdvisor extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','program','interest','date','message'];
}
