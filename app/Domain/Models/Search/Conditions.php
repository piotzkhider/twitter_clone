<?php

namespace App\Domain\Models\Search;

class Conditions
{
    /**
     * @var string
     */
    private $value;

    /**
     * Conditions constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * 分割する.
     *
     * @return array
     */
    public function split(): array
    {
        return mb_split($this->spaces(), $this->value);
    }

    /**
     * 半角スペースと全角スペース.
     *
     * @return string
     */
    protected function spaces(): string
    {
        return '[\s　]';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(', ', $this->split());
    }
}
