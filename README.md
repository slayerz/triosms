#Trio SMS

[![Latest Stable Version](https://poser.pugx.org/slayerz/triosms/v/stable.svg)](https://packagist.org/packages/slayerz/triosms)
[![Total Downloads](https://poser.pugx.org/slayerz/triosms/downloads.svg)](https://packagist.org/packages/slayerz/triosms)
[![Latest Unstable Version](https://poser.pugx.org/slayerz/triosms/v/unstable.svg)](https://packagist.org/packages/slayerz/triosms)
[![License](https://poser.pugx.org/slayerz/triosms/license.svg)](https://packagist.org/packages/slayerz/triosms)

## Introduction

Send SMS in Laravel 4 using API from [trio-mobile.com](http://www.trio-mobile.com)

## Installation

Require this package with composer:

	composer require slayerz/triosms

After updating composer, add the ServiceProvider to the providers array in `app/config/app.php`

	'Slayerz\Triosms\TriosmsServiceProvider',

You can have your own config for this package by publishing it

	php artisan config:publish slayerz/triosms

Once published, you can modify the config in `app/config/packages/slayerz/triosms/config.php`

	'url'	=> 'API-URL-ADDRESS',
	'token' => 'API-TOKEN',
	'mode'	=> 'ACCOUNT-WITH-CREDIT'

You have to configure the default sender mode for your account.
The default sender mode is set to _`shortcode`_

Available mode for Trio SMS:

	'shortcode' (send SMS using 5 digits number to international)
	'longcode'  (send SMS using 10 digits number within Malaysia)

## Usage

Function send()

	Sms::send($recipient, $message, $mode = '', $format = '');

- **$recipient**: recipient mobile number
- **$message**: message to be sent (160 chars for ASCII, 70 chars for UNICODE)
- **$mode**: account to send the SMS from (default: `shortcode`)
- **$format**: content type either 1: ASCII or 4: UNICODE (defaut: `1`)

Function balance()

	Sms::balance($mode = '');

- **$mode**: account you wish to check balance from (default: shortcode)

## Usage Example

Sending SMS

	public function sendSMS()
	{
		return Sms::send('60123456789', 'Your message in 160 chars for ASCII format and 70 chars for UNICODE');
	}

Successful message should output positive value return code

	CP22051400000001

Checking Credit Balance

	public function balanceCheck()
	{
		return Sms::balance();
	}

Successful check should output positive integer value

	1987

### License

Trio SMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)