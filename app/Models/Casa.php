<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'imageBase',
        'city',
        'state',
        'category',
        'information',
        'description',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
