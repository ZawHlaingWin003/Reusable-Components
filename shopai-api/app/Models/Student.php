<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'group_id',
        'position'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    const POSITION_GAP = 60000;
    const POSITION_MIN = 0.00002;

    public static function booted()
    {
        static::creating(function ($model) {
            $model->position = self::query()
                ->where('group_id', $model->group_id)
                ->orderByDesc('position')
                ->first()?->position + self::POSITION_GAP;
        });

        static::saved(function ($model) {
            if ($model->position < self::POSITION_MIN) {
                DB::statement("SET @previousPosition := 0");
                DB::statement(
                    "
                    UPDATE students
                    SET position = (@previousPosition := @previousPosition + ?)
                    WHERE group_id = ?
                    ORDER BY position
                ",
                    [
                        self::POSITION_GAP,
                        $model->group_id
                    ]
                );
            }
        });
    }
}
