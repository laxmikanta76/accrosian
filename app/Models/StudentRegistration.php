<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'college_name',
        'course',
        'specialization',
        'year',
        'resume',
        'status',
    ];

    public function getResumeUrlAttribute(): ?string
    {
        if (!$this->resume) return null;
        return asset('storage/' . $this->resume);
    }

    public function getStatusBadgeAttribute(): string
    {
        if ($this->status === 'new') {
            return '<span class="badge badge-new">New</span>';
        } elseif ($this->status === 'reviewed') {
            return '<span class="badge badge-read">Reviewed</span>';
        } elseif ($this->status === 'shortlisted') {
            return '<span class="badge badge-active">Shortlisted</span>';
        } elseif ($this->status === 'rejected') {
            return '<span class="badge badge-inactive">Rejected</span>';
        }
        return '<span class="badge">Unknown</span>';
    }
}