<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_description',
        'app_logo_light',
        'app_logo_dark',
        'app_version',
        'school_full_name',
        'school_short_name',
        'school_logo_light',
        'school_logo_dark',
        'school_address',
        'school_phone',
        'school_mobile',
        'school_email',
        'school_npsn',
        'school_instagram',
        'school_facebook',
        'school_twitter',
        'school_youtube',
        'school_website',
        'school_headmaster',
        'is_interface_maintenance',
        'is_api_maintenance',
        'is_payment_maintenance',
    ];
}
