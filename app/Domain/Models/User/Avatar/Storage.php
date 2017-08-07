<?php

namespace App\Domain\Models\User\Avatar;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class Storage
{
    /**
     * アバター画像を格納する
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return \App\Domain\Models\User\Avatar\FilePath
     */
    public static function store(UploadedFile $file): FilePath
    {
        if (! $storedPath = $file->store('public/avatars')) {
            throw new FileException();
        }

        return new FilePath($storedPath);
    }
}
