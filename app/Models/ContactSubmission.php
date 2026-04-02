<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone','subject','message','status',
    ];

    const STATUS_NEW     = 'new';
    const STATUS_READ    = 'read';
    const STATUS_REPLIED = 'replied';

    public function getStatusBadgeAttribute(): string
    {
        if ($this->status === 'new') {
        return '<span class="badge badge-new">New</span>';
    } elseif ($this->status === 'read') {
        return '<span class="badge badge-read">Read</span>';
    } elseif ($this->status === 'replied') {
        return '<span class="badge badge-replied">Replied</span>';
    }

    return '<span class="badge">Unknown</span>';
    }
}