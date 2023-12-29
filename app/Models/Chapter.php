<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['manga_id', 'title', 'index', 'content'];

    protected $casts = [
        'content' => 'array',
    ];

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
