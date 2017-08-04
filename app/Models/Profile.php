<?php

namespace App\Models;

use App\Domain\Models\Profile\Avatar;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'avatar',
    ];

    /**
     * アクセサ
     *
     * @param null|string $value
     * @return \App\Domain\Models\Profile\Avatar
     */
    public function getAvatarAttribute(?string $value): Avatar
    {
        return new Avatar($value);
    }
}
