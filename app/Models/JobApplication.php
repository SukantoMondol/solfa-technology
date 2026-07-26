<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_title',
        'name',
        'email',
        'phone',
        'cv_path',
        'portfolio_link',
        'cover_letter',
        'status',
    ];
}
