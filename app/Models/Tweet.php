<?php

namespace App\Models;

use App\Domain\Models\Tweet\CreatedDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property \App\Domain\Models\Tweet\CreatedDate $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet forHomeOf(\App\Models\User $me)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet forProfileOf(\App\Models\User $user)
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

    /**
     * ホーム画面用のツイート一覧を取得する
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Models\User $me
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForHomeOf(Builder $query, User $me): Builder
    {
        return $query->where('user_id', $me->id)->orWhereIn('user_id', $me->friends->pluck('id'))->latest();
    }

    /**
     * プロフィール画面用のツイート一覧を取得する
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForProfileOf(Builder $query, User $user): Builder
    {
        return $query->where('user_id', $user->id)->latest();
    }
}
