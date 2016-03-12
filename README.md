Laravel HTML Email Inliner
==========================

To make HTML email work, you need to put all CSS rules inline to make sure it works everywhere. It's a pain when developing your code and that's why you want a package to do it on the fly.

This is just a Laravel wrapper for PHP-premailer (https://github.com/onassar/PHP-Premailer)

## Installation

### Ruby gems

This package require two Ruby Gems: Premailer and Getopt.

	$ sudo gem install premailer
	$ sudo gem install getopt

Check this Gists for more info on dependencies on Ubuntu (Laravel Homestead): https://gist.github.com/emilsundberg/8ae10ca886058c683d13

### Laravel

Begin by installing this package through Composer.

	$ composer require snowfire/beautymail

Add Inliner as a service provider in app.php

	'providers' => [
		Emil\Inliner\InlinerServiceProvider::class,
	]

Add Inliner alias

	'aliases' => [
		Emil\Inliner\Facades\Laravel\Inliner::class
	]

## Laravel 4.2

To make the library backwards compatible, publish the config.php file to your app using the following command

	`php artisan vendor:publish`

Then open the published config file and change the cache_path value to `storage_path().'/cache/'`.

Then run `composer update`


## Quick Example

#### Disable/enable the inliner
*The inliner is enabled by default*

```php
Inliner::disable();
Inliner::enable();
```

#### Check if the inliner is enabled/disabled
```php
Inliner::isDisabled();
Inliner::isEnabled();
```

#### Change an option
```php
Inliner::setOption('name', value);
```

*Sending in an option that does not exist will throw*
`InvalidArgumentException`

##### Options

* `css_to_attributes`
* `include_link_tags`
* `include_style_tags`
* `input_encoding`
* `preserve_reset`
* `preserve_styles`
* `remove_classes`
* `remove_comments`
* `remove_ids`
* `remove_scripts`
* `replace_html_entities`
