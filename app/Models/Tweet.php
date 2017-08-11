<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property string $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereUserId($value)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    /**
     * リレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アクセサ
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);

        if (Carbon::now()->diffInYears($date) > 0) {
            return $date->format('j M Y');
        }

        if (Carbon::now()->diffInHours($date) > 24) {
            return $date->format('M j');
        }

        if (Carbon::now()->diffInMinutes($date) > 60) {
            return sprintf('%sh', Carbon::now()->diffInHours($date));
        }

        if (Carbon::now()->diffInSeconds($date) > 60) {
            return sprintf('%sm', Carbon::now()->diffInMinutes($date));
        }

        if (Carbon::now()->diffInSeconds($date) > 1) {
            return sprintf('%ss', Carbon::now()->diffInSeconds($date));
        }

        return 'now';
    }
}
