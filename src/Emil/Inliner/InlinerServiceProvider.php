<?php

namespace Emil\Inliner;

use Illuminate\Support\ServiceProvider;

class InlinerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $configFile = __DIR__.'/../../config/config.php';

        $this->mergeConfigFrom($configFile, 'inliner');

        $this->publishes([
            $configFile => config_path('inliner.php'),
        ]);

        $this->app['mailer']
            ->getSwiftMailer()
            ->registerPlugin(new CssInlinerPlugin($this->app['emil.inliner']));
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app['emil.inliner'] = $this->app->share(function ($app) {
            $inliner = $this->app['config']->get('inliner');

            return new Inliner($inliner['options'], $inliner['cache_path']);
        });
    }
}
