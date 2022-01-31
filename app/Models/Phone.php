<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'description',
    ];

    protected $hidden = [
        'subject_type',
        'subject_id',
    ];

    protected $casts = [
        'number' => 'string',
        'description' => 'string',
    ];

    public function phonable(): MorphTo
    {
        return $this->morphTo('phonable');
    }
}
