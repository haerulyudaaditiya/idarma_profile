<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name_position',
        'serial',
        'structure',
    ];

    public function parent()
    {
        return $this->belongsTo(Position::class, 'structure', 'serial');
    }

    public function children()
    {
        return $this->hasMany(Position::class, 'structure', 'serial');
    }

    public function organization()
    {
        return $this->hasOne(Organization::class);
    }
}
