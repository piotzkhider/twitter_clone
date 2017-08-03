<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class TrimStrings extends BaseTrimmer
{
    /**
     * トリムを行わない属性名
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
