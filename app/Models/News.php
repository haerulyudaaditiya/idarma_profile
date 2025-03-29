<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class News extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'news_category_id',
        'title',
        'content',
        'cover',
    ];

    public $incrementing = false;
    protected $keyType = 'string';


    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments() {
        return $this->hasMany(NewsComment::class);
    }
}
