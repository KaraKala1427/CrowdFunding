<?php

namespace App\Models;

use Carbon\Carbon;
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
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function images() {
        return $this->hasMany(Image::class, 'id', 'image_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getLeftDaysAttribute()
    {
        return Carbon::parse($this->start_date)->diffInDays(Carbon::parse($this->end_date));;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
