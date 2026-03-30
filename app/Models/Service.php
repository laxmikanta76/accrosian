<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','short_description','full_description','image','hero_image','icon',
        'meta_title','meta_description','meta_keywords','og_image','status','sort_order',
    ];

    protected $casts = ['status' => 'boolean'];

    public function getRouteKeyName(): string { return 'slug'; }

    public function scopeActive($query) { return $query->where('status', true); }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('uploads/' . $this->image))) {
            return asset('uploads/' . $this->image);
        }
        return asset('assets/images/web-dev-img.png');
    }
    
    public function getHeroImageUrlAttribute(): string
{
    if ($this->hero_image && file_exists(public_path('storage/' . $this->hero_image))) {
        return asset('storage/' . $this->hero_image);
    }
    // fallback: use same image as content, or a default hero
    return $this->image 
        ? asset('storage/' . $this->image) 
        : asset('assets/images/web-dev-img.png');
}
}