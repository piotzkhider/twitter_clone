<?php

namespace App\Domain\Models\User\Avatar;

class DefaultAvatar implements Avatar
{
    /**
     * @var string
     */
    private $value;

    /**
     * DefaultAvatar constructor.
     */
    public function __construct()
    {
        $this->value = 'images/no-thumb.png';
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
