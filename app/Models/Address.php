<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'state_abbr',
        'country',
        'country_abbr',
        'latitude',
        'longitude',
        'comment',
    ];

    protected $hidden = [
        'subject_type',
        'subject_id',
    ];

    protected $casts = [
        'postal_code' => 'string',
        'address_line_1' => 'string',
        'address_line_2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'state_abbr' => 'string',
        'country' => 'string',
        'country_abbr' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'comment' => 'string',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }
}
