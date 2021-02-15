<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'library';

    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_library', 'library_id', 'book_id')->withPivot('id')->withTimestamps();
    }
}
