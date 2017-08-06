<?php

namespace App\Domain\Models\User;

class ProfileImage
{
    /**
     * @var null|string
     */
    private $filename;

    /**
     * Avatar constructor.
     *
     * @param null|string $filename
     */
    public function __construct(?string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @var string
     */
    private $folderPath = 'images/profile_images';

    /**
     * @var string
     */
    private $default = 'no-thumb.png';

    /**
     * @return string
     */
    public function __toString(): string
    {
        $filename = $this->filename ? $this->filename : $this->default;

        return asset(sprintf('%s/%s', $this->folderPath, $filename));
    }
}
