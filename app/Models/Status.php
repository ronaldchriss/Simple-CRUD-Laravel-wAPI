<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
        'status',
        'relation',
        'created_by'
    ];

    public function reply()
    {
        return $this->belongsTo(Content::class, 'id', 'relation');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
