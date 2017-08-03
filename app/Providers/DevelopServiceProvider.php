<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class DevelopServiceProvider extends ServiceProvider
{
    /**
     * 本番ではインストールしないものであるため、「::class」ではなく文字列で定義
     *
     * @var array
     */
    protected $providers = [
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
        'Barryvdh\Debugbar\ServiceProvider',
    ];


    /**
     * localでのみ設定したいクラスエイリアス
     *
     * @var array
     */
    protected $aliases = [
        'Debugbar' => 'Barryvdh\Debugbar\Facade',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->isLocalOrTesting()) {
            \DB::listen(function ($query) {
                \Log::debug('EXECUTE SQL:[' . $query->sql . ']', ['BINDINGS' => json_encode($query->bindings)]);
                \Log::debug('###################################');
            });
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\App::isLocal()) {
            $this->registerServiceProvider();
            $this->registerAliases();
        }
    }

    /**
     * 開発時のみ使用するサービスプロバイダの登録
     */
    protected function registerServiceProvider()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }

    /**
     * クラスエイリアスの登録
     */
    protected function registerAliases()
    {
        if (! empty($this->aliases)) {
            $loader = AliasLoader::getInstance();

            foreach ($this->aliases as $facade => $alias) {
                $loader->alias($alias, $facade);
            }
        }
    }

    /**
     * @return bool
     */
    protected function isLocalOrTesting()
    {
        return \App::isLocal() || env('APP_ENV') == 'testing';
    }
}
