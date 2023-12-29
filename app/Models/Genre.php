<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre_name'];

    public function mangas()
    {
        return $this->belongsToMany(Manga::class, 'manga_genre');
    }

}
