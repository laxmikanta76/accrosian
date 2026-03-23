<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name','site_title','logo','favicon','meta_title','meta_description',
        'meta_keywords','footer_text','contact_email','contact_phone','address',
        'facebook','instagram','linkedin','twitter','google_analytics',
        'og_image','header_logo','footer_logo',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::first();
        return $setting ? ($setting->$key ?? $default) : $default;
    }

    public static function getValue(string $key, $default = null)
    {
        return static::get($key, $default);
    }
}
