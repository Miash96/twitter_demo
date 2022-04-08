<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Twitt extends Model
{
    protected $fillable = ['text','user_id'];


    protected $appends = [
        'difference'
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function getDifferenceAttribute(): int
    {
        /** @var Carbon $created_at */
        $created_at = $this->created_at;

        return $created_at->diffInDays(now());
    }

}
