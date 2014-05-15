<?php namespace Emil\Inliner\Facades;

use Illuminate\Support\Facades\Facade;

Class Inliner extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'emil.inliner'; }

}