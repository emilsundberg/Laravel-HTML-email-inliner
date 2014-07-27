Laravel HTML Email Inliner
==========================
To make HTML email work, you need to put all CSS rules inline to make sure it works everywhere. It's a pain when developing your code and that's why you want a package to do it on the fly.

This is just a Laravel wrapper for PHP-premailer (https://github.com/onassar/PHP-Premailer)

## Installation

Begin by installing this package through Composer. Edit your project's composer.json file to require emil/inliner

	"require": {
        "emil/inliner": "dev-master"
    }

Add Inliner as a service provider in app.php

	"providers" => [
		'Emil\Inliner\InlinerServiceProvider',
	]

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
