<?php

namespace App\Domain\Models\User\Avatar;

use Illuminate\Http\UploadedFile;

class AvatarStorage
{
    const PATH = 'public/avatars';

    /**
     * @return \App\Domain\Models\User\Avatar\AvatarStorage
     */
    public static function load(): AvatarStorage
    {
        return new static();
    }

    /**
     * @param \Illuminate\Http\UploadedFile|null $file
     * @return false|string
     */
    public function store(?UploadedFile $file)
    {
        if ($this->notUploaded($file)) {
            return self::defaultAvatarPath();
        }

        return $file->store(self::PATH);
    }

    /**
     * @param \Illuminate\Http\UploadedFile|null $file
     * @return bool
     */
    private function notUploaded(?UploadedFile $file)
    {
        return is_null($file);
    }

    /**
     * @return string
     */
    public static function defaultAvatarPath(): string
    {
        return sprintf('%s/%s', self::PATH, 'no-thumb.png');
    }
}
