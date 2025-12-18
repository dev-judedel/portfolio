<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'title',
        'tagline',
        'bio',
        'short_bio',
        'profile_image',
        'cv_file',
        'email',
        'phone',
        'location',
        'social_links',
        'years_experience',
        'projects_completed',
        'happy_clients',
    ];

    protected $casts = [
        'social_links' => 'array',
        'years_experience' => 'integer',
        'projects_completed' => 'integer',
        'happy_clients' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getProfileImageUrlAttribute(): string
    {
        return $this->profile_image 
            ? asset('storage/' . $this->profile_image)
            : asset('images/default-avatar.png');
    }

    public function getCvFileUrlAttribute(): ?string
    {
        return $this->cv_file ? asset('storage/' . $this->cv_file) : null;
    }
}
