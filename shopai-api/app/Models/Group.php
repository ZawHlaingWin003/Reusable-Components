<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'position'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function studentsByPosition()
    {
        return $this->hasMany(Student::class)->orderBy('position');
        // Or alternatively, even...
        // return $this->students()->orderBy('position');
    }

    const POSITION_GAP = 1;

    public static function booted()
    {
        static::creating(function ($model) {
            $model->position = self::query()
                ->orderByDesc('position')
                ->first()?->position + self::POSITION_GAP;
        });
    }
}
