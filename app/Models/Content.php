<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme',
        'title',
        'video',
        'view',
        'desc',
        'like',
        'dislike'
    ];

    public function themes()
    {
        return $this->belongsTo('App\Models\Theme', 'theme', 'id');
    }
}
