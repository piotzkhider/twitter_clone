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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet forHome()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet ofFollowees(\App\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet ofUser(\App\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tweet timeline()
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

    #region スコープ

    /**
     * 時系列降順に並び替える
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTimeline(Builder $builder): Builder
    {
        return $builder->latest();
    }

    /**
     * ホームに必要なツイートに絞り込む
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForHome(Builder $builder): Builder
    {
        $user = \Auth::user();

        return $builder->ofUser($user)->orWhere(function (Builder $query) use ($user) {
            $query->ofFollowees($user);
        });
    }

    /**
     * ユーザーのツイートに絞り込む
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUser(Builder $builder, User $user): Builder
    {
        return $builder->where('user_id', $user->id);
    }

    /**
     * フォロイーのツイートに絞り込む
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfFollowees(Builder $builder, User $user): Builder
    {
        return $builder->whereIn('user_id', $user->followees->pluck('id'));
    }

    #endregion
}
