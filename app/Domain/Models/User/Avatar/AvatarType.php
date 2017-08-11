<?php

namespace App\Domain\Models\User\Avatar;

class AvatarType
{
    /**
     * @param string $filePath
     * @return \App\Domain\Models\User\Avatar\Avatar
     */
    public static function avatar(string $filePath): Avatar
    {
        if ($filePath == $default = new DefaultAvatar()) {
            return $default;
        }

        return new StoredAvatar($filePath);
    }
}
