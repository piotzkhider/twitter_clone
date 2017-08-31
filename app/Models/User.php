<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use App\Domain\Models\User\AvatarStorage;
use App\Domain\Models\User\Avatar\AvatarType;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $url_name
 * @property string $email
 * @property string $password
 * @property string|null $display_name
 * @property string|null $description
 * @property string $avatar
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $following
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tweet[] $tweets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUrlName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * 複数代入を行う属性.
     *
     * @var array
     */
    protected $fillable = [
        'url_name',
        'email',
        'password',
        'display_name',
        'avatar',
        'description',
    ];

    /**
     * 配列には含めない属性.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //region リレーション

    /**
     * リレーション.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets(): HasMany
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * リレーション.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'friendships', 'follower_id', 'followee_id')->withTimestamps();
    }

    /**
     * リレーション.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'friendships', 'followee_id', 'follower_id')->withTimestamps();
    }

    //endregion

    //region アクセサ/ミューテータ

    /**
     * アクセサ.
     *
     * @param string $value
     * @return string
     */
    public function getAvatarAttribute(string $value): string
    {
        return AvatarType::avatar($value)->url();
    }

    /**
     * ミューテータ
     *
     * @param \Illuminate\Http\UploadedFile|null|string $value
     */
    public function setAvatarAttribute($value)
    {
        if (is_null($value)) {
            return;
        }

        if ($value instanceof UploadedFile) {
            $stored = AvatarStorage::store($value);
            $this->attributes['avatar'] = $stored;

            return;
        }

        $this->attributes['avatar'] = $value;
    }

    //endregion

    /**
     * つぶやく.
     *
     * @param string $body
     * @return \Illuminate\Database\Eloquent\Model|\App\Models\Tweet
     */
    public function tweet(string $body)
    {
        return $this->tweets()->create(['body' => $body]);
    }

    /**
     * フォローする.
     *
     * @param \App\Models\User $followee
     */
    public function follow(User $followee)
    {
        $this->following()->attach($followee->id);
    }

    /**
     * フォローを外す.
     *
     * @param \App\Models\User $following
     */
    public function unfollow(User $following)
    {
        $this->following()->detach($following->id);
    }

    /**
     * フォローしているかどうか.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function isFollowingWith(User $user): bool
    {
        return $this->following()->wherePivot('followee_id', $user->id)->exists();
    }

    /**
     * 同じユーザーかどうか.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function equals(User $user): bool
    {
        return $this->id === $user->id;
    }
}
