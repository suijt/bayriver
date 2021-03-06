<?php

namespace App\Modules\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseBooking extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','address','date'];
}
