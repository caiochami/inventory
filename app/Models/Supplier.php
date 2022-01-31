<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'region',
        'city',
        'country',
        'contact_title',
        'contact_name',
        'contact_phone',
        'contact_fax',
        'contact_email',
    ];

    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class);
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phonable');
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(
            Inventory::class,
            'inventory_supplier',
            'supplier_id'
        )
            ->withTimestamps();
    }
}
