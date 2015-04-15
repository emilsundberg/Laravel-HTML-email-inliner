<?php namespace Emil\Inliner;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class InlinerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->app['mailer']
			->getSwiftMailer()
			->registerPlugin(new CssInlinerPlugin($this->app['emil.inliner']));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
            base_path('vendor/emil/inliner/src/config/config.php'), 'inliner'
        );

		$this->app['emil.inliner'] = $this->app->share(function($app){
            $inliner = $this->app['config']->get('inliner');
            // print_r($options);die;
			return new Inliner($inliner['options']);
		});

		$this->app->booting(function() {
			$loader = AliasLoader::getInstance();
			$loader->alias('Inliner', 'Emil\Inliner\Facades\Inliner');
		});
	}

}