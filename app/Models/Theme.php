<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_thm',
        'img_thm',
        'desc_thm',
        'flag'
    ];

    public function contents()
    {
        return $this->hasMany('App\Models\Content', 'id', 'theme');
    }
}
