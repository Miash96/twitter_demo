<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public $fillable = [
        'value',
        'user_id',
        'twitt_id',
        'parent_id'
    ];

    protected $appends = [
        'difference',
        'kids'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function twitt()
    {
        return $this->belongsTo(Twitt::class);
    }

    public function getDifferenceAttribute(): int
    {
        /** @var Carbon $created_at */
        $created_at = $this->created_at;

        return $created_at->diffInDays(now());
    }

    public function getKidsAttribute()
    {
        return self::query()->where('parent_id', '=', $this->id)->get();
    }
}


