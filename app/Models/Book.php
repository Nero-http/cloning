<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'title',
        'slug',
        'isbn',
        'price',
        'description',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            'book_genre'
        );
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
