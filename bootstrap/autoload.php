<?php

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Composerのオートローダーの登録
|--------------------------------------------------------------------------
|
| Composerはアプリケーションのために、自動的にクラスローダーを
| 生成してくれます。それを利用しなくてはなりません！「手動」で
| into the script here so we do not have to manually load any of
| our application's PHP classes. It just feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';
