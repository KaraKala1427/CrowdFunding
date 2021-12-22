<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'description'
    ];

    public function images() {
        return $this->hasMany(Image::class, 'id', 'image_id');
    }
}
