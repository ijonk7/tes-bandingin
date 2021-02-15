<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'book_library', 'book_id', 'library_id')->withPivot('id')->withTimestamps();
    }
}
