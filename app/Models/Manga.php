<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'chapter_count', 'total_bookmarks', 'year_of_release', 'author'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'manga_genre');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

}
