<?php

namespace App\Domain\Models\User\Avatar;

class Avatar
{
    /**
     * @var string
     */
    private $filename;

    /**
     * Avatar constructor.
     *
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param string $storedPath
     * @return \App\Domain\Models\User\Avatar\Avatar
     */
    public static function fromStoredPath(string $storedPath): Avatar
    {
        $filename = last(explode('/', $storedPath));

        return new static($filename);
    }

    /**
     * @var string
     */
    private $storagePath = 'storage/avatars';

    /**
     * @return string
     */
    public function __toString(): string
    {
        return asset(sprintf('%s/%s', $this->storagePath, $this->filename));
    }
}
