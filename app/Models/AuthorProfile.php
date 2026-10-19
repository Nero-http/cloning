<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorProfile extends Model
{
    use HasFactory;

    protected $table = 'author_profiles';

    protected $fillable = [
        'author_id',
        'bio',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
