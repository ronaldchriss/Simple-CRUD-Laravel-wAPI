<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'review'
    ];

    public function reply()
    {
        return $this->belongsTo(Content::class, 'id', 'content');
    }
}
