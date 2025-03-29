<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class NewsComment extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'news_comments';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'news_id',
        'name',
        'comment',
        'parent_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function parent()
    {
        return $this->belongsTo(NewsComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(NewsComment::class, 'parent_id');
    }
}
