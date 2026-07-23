<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOpening extends Model
{
    protected $table = 'jobs_openings';

    protected $fillable = [
        'title', 'slug', 'location', 'type', 'workplace_type', 'vacancies', 'salary',
        'summary', 'description', 'deadline', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'deadline' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (JobOpening $job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderByDesc('created_at');
    }
}
