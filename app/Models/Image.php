<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'casa_id',
    ];

    public function casas()
    {
        return $this->belongsTo(Casa::class);
    }
}
