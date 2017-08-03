<?php

namespace App\Models;

use App\Domain\Models\Tweet\CreatedDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property \App\Domain\Models\Tweet\CreatedDate $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet withFriendsTweets(\Illuminate\Support\Collection $friends)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['body'];

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
     * 友達のツイートも表示する
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Support\Collection $friends
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithFriendsTweets(Builder $query, Collection $friends): Builder
    {
        return $query->orWhereIn('user_id', $friends->pluck('id'));
    }

    /**
     * アクセサ
     *
     * @param $value
     * @return \App\Domain\Models\Tweet\CreatedDate
     */
    public function getCreatedAtAttribute(string $value): CreatedDate
    {
        $parsed = Carbon::parse($value);

        return new CreatedDate($parsed);
    }
}
