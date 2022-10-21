<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'article_id', 'file_gambar', 'is_active'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
