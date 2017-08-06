<?php

namespace App\Models;

use App\Domain\Models\User\Avatar;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $url_name
 * @property string $email
 * @property string $password
 * @property string|null $display_name
 * @property string|null $description
 * @property \App\Domain\Models\User\Avatar $profile_image_url
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followers
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tweet[] $tweets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProfileImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUrlName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'url_name',
        'email',
        'password',
        'display_name',
        'avatar',
    ];

    /**
     * 配列には含めない属性
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    #region リレーション

    /**
     * リレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets(): HasMany
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * リレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'sender_id', 'recipient_id');
    }

    /**
     * リレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'recipient_id', 'sender_id');
    }

    #endregion

    #region アクセサ

    /**
     * アクセサ
     *
     * @param null|string $value
     * @return \App\Domain\Models\User\Avatar
     */
    public function getAvatarAttribute(?string $value): Avatar
    {
        return new Avatar($value);
    }

    #endregion

    /**
     * 違うユーザーかどうか
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function notEquals(User $user): bool
    {
        return $this->id !== $user->id;
    }
}
