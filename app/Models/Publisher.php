<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'publisher_name',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch(
        Builder $query,
        ?string $search
    ): Builder {
        return $query->when(
            filled($search),
            fn (Builder $query) => $query->where(
                'publisher_name', 'like', "%{$search}%"
            )
        );
    }

    public function scopeLatestFirst(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }
}