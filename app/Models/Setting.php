<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    public static function get($key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function() use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->getValue() : $default;
        });
    }

    public static function set($key, $value, $type = 'text', $group = 'general')
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type, 'group' => $group]
        );
        
        Cache::forget("setting_{$key}");
        return $setting;
    }

    public function getValue()
    {
        return match($this->type) {
            'boolean' => (bool) $this->value,
            'json' => json_decode($this->value, true),
            'integer' => (int) $this->value,
            default => $this->value,
        };
    }
}
