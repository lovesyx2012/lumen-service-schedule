<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // 加载配置文件
        $this->app->configure('alidayu');
        $this->mergeConfigFrom(realpath(__DIR__ . '/../../config/alidayu.php'),
            'yunsom');
    }

    public function boot()
    {

    }
}