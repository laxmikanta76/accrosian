<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','category','image','description',
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
        return asset('assets/images/about-us.jpg');
    }
}
