<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    protected $fillable = [
        // Basic Info
        'user_id',
        'slug',
        'title',
        'description',
        'price',
        'property_type',
        'listing_type',

        // Location
        'country',
        'city',
        'address',

        // Property Details
        'bedrooms',
        'bathrooms',
        'parking_spaces',

        // Features
        'wifi',
        'elevator',
        'garden',
        'pool',

        // Images (you usually store paths/filenames in DB, not the uploaded files directly)
        'image_1',
        'image_2',
        'image_3',
    ];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
