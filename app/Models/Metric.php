<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Metric extends Model
{
    use HasFactory;

    protected $casts = ['default' => 'boolean'];

    protected $fillable = [
        'name',
        'symbol',
        'user_id'
    ];

    public function name(): Attribute
    {
        return new Attribute(
            set:fn ($value) => Str::title($value),
        );
    }

    public function symbol(): Attribute
    {
        return new Attribute(
            set:fn ($value) => Str::lower($value),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'System'
        ]);
    }
}
