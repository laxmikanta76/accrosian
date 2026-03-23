<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','banner_image','content',
        'meta_title','meta_description','meta_keywords','og_image','status',
    ];

    protected $casts = ['status' => 'boolean'];

    public function getRouteKeyName(): string { return 'slug'; }

    public function getBannerUrlAttribute(): string
    {
        if ($this->banner_image && file_exists(public_path('uploads/' . $this->banner_image))) {
            return asset('uploads/' . $this->banner_image);
        }
        return asset('assets/images/hero-bg-img-2.png');
    }
}
