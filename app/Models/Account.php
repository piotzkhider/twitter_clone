<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $description
 * @property \App\Domain\Models\Profile\Avatar $avatar
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $friends
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tweet[] $tweets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereUsername($value)
 * @mixin \Eloquent
 */
class Account extends Authenticatable
{
    use Notifiable;

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

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
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'friendships', 'sender_id', 'recipient_id');
    }

    /**
     * リレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'friendships', 'recipient_id', 'sender_id');
    }

    #endregion

    /**
     * 違うユーザーかどうか
     *
     * @param \App\Models\Account $user
     * @return bool
     */
    public function notEquals(Account $user): bool
    {
        return $this->id !== $user->id;
    }
}
