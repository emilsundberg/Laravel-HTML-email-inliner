<?php namespace Emil\Inliner;

use Illuminate\Support\ServiceProvider;

class InlinerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('emil/inliner');

        $this->app['mailer']->getSwiftMailer()->registerPlugin(new CssInlinerPlugin($this->app['emil.inliner']));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['emil.inliner'] = $this->app->share(function($app){
            $options = $this->app['config']->get('inliner::options');
			return new Inliner($options);
		});

		$this->app->booting(function() {

			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Inliner', 'Emil\Inliner\Facades\Inliner');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}