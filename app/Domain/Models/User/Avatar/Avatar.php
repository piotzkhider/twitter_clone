<?php

namespace App\Domain\Models\User\Avatar;

interface Avatar
{
    /**
     * @return string
     */
    public function url(): string;
}
