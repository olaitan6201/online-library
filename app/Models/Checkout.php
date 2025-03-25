<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'checked_out_at',
        'due_date',
        'checked_in_at',
    ];

    protected $casts = [
        'checked_out_at' => 'datetime',
        'due_date' => 'datetime',
        'checked_in_at' => 'datetime',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOverdue()
    {
        return !$this->checked_in_at && $this->due_date->isPast();
    }
}
