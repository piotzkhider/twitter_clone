<?php

namespace App\Domain\Models\User\Avatar;

class StoredAvatar implements Avatar
{
    /**
     * @var string
     */
    private $value;

    /**
     * Avatar constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return \Storage::url($this->value);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
