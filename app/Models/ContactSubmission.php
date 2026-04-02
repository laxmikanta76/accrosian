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
        return match ($this->status) {
            'new'     => '<span class="badge badge-new">New</span>',
            'read'    => '<span class="badge badge-read">Read</span>',
            'replied' => '<span class="badge badge-replied">Replied</span>',
            default   => '<span class="badge">Unknown</span>',
        };
    }
}