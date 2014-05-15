Laravel package for PHP-Premailer
=================================
To make HTML email work, you need to put all CSS rules inline to make sure it works everywhere. It's a pain when developing your code and that's why you want a package to do it on the fly.

This is just a Laravel wrapper for PHP-premailer (https://github.com/onassar/PHP-Premailer)

## Installation

Begin by installing this package through Composer. Edit your project's composer.json file to require emil/inliner

	"require-dev": {
        "emil/inliner": "dev-master"
    }

Add Inliner as a service provider in app.php

	'providers' => [
		'Emil\Inliner\InlinerServiceProvider',
	]

Then run `composer update`


## Quick Example

``` php
Inliner::view('emails.templates.newsletter');
Inliner::argument('include_style_tags', true);
Inliner::argument('preserve_styles', true);
echo Inliner::getConvertedHtml();
```

## Arguments

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
