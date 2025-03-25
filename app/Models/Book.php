<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'isbn',
        'revision_number',
        'published_date',
        'publisher',
        'author',
        'date_added',
        'genre',
        'cover_image_path',
        'description',
        'pages',
        'status',
    ];

    protected $casts = [
        'published_date' => 'date',
        'date_added' => 'date',
    ];

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }

    public function currentCheckout()
    {
        return $this->hasOne(Checkout::class)->whereNull('checked_in_at');
    }

    public function isAvailable()
    {
        return $this->status === 'available';
    }

    // Accessor for cover image URL
    public function getCoverImageUrlAttribute()
    {
        return $this->cover_image_path ? asset('storage/'.$this->cover_image_path) : asset('images/default-book-cover.jpg');
    }
}
