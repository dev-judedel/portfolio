<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_position',
        'client_company',
        'testimonial',
        'client_image',
        'rating',
        'project_name',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'rating' => 'integer',
        'order' => 'integer',
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getClientImageUrlAttribute(): ?string
    {
        return $this->client_image 
            ? asset('storage/' . $this->client_image)
            : asset('images/default-avatar.png');
    }
}
