<?php

namespace App\Domain\Models\User;

use App\Domain\Models\User\Avatar\StoredAvatar;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AvatarStorage
{
    /**
     * @var string
     */
    const PATH = 'public/avatars';

    /**
     * アバター画像を格納する
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return \App\Domain\Models\User\Avatar\StoredAvatar
     */
    public static function store(UploadedFile $file): StoredAvatar
    {
        if (! $storedPath = \Storage::putFile(self::PATH, $file)) {
            throw new FileException();
        }

        return new StoredAvatar($storedPath);
    }
}
