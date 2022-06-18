<?php

namespace App\Modules\Models\ApplyNow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyNow extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'phone_number', 
        'option', 'study', 'time',
        'interest', 'hear', 'signature', 'nationality', 'passport_number',
        'date', 'gender', 'state', 'zip_code', 'country_name', 'emergency_contact_name',
        'emergency_contact_address', 'emergency_contact_state', 'emergency_contact_email',
        'emergency_contact_country_name', 'emergency_contact_number', 'program', 'other', 'checklist'
    ];
}
