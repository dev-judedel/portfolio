<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'position',
        'location',
        'description',
        'start_date',
        'end_date',
        'is_current',
        'technologies',
        'company_logo',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'technologies' => 'array',
        'order' => 'integer',
    ];

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderByDesc('start_date');
    }

    public function getDurationAttribute(): string
    {
        $start = $this->start_date;
        $end = $this->is_current ? now() : $this->end_date;
        
        $years = $start->diffInYears($end);
        $months = $start->copy()->addYears($years)->diffInMonths($end);
        
        $parts = [];
        if ($years > 0) $parts[] = $years . ' ' . str('year')->plural($years);
        if ($months > 0) $parts[] = $months . ' ' . str('month')->plural($months);
        
        return implode(', ', $parts) ?: 'Less than a month';
    }

    public function getFormattedDateRangeAttribute(): string
    {
        $start = $this->start_date->format('M Y');
        $end = $this->is_current ? 'Present' : $this->end_date->format('M Y');
        return "$start - $end";
    }
}
