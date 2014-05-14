Laravel package for PHP-Premailer
=================================
To make HTML email work, you need to put all CSS rules inline to make sure it works everywhere. It's a pain when developing your code and that's why you want a package to do it on the fly.

This is just a Laravel wrapper for PHP-premailer (https://github.com/onassar/PHP-Premailer)

## Installation

Begin by installing this package through Composer. Edit your project's composer.json file to require emil/inliner

	"require-dev": {
        "emil/inliner": "dev-master"
    }

Then run `composer update`

Optional: When you are done, create an alias in app.php

	'aliases' => [
    		'Inliner'         => 'Emil\Inliner\Inliner',
    ]

## Quick Example

``` php
$view = View::make('hello');
$inliner = new Inliner($view);
$body = $inliner->getConvertedHtml();

echo $body;
```
