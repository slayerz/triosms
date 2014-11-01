<?php

return array(
    /*
	|--------------------------------------------------------------------------
	| API URL
	|--------------------------------------------------------------------------
	|
	| SMS gateway API URL for trio-mobile.com
	|
	*/
    'url'    => '',

    /*
	|--------------------------------------------------------------------------
	| API TOKEN
	|--------------------------------------------------------------------------
	|
	| SMS gateway API TOKEN provided for this application
	|
	*/
    'token'  => '',

    /*
	|--------------------------------------------------------------------------
	| SENDER ID
	|--------------------------------------------------------------------------
	|
	| SMS gateway SENDER ID provided for this application
	|
	*/
    'sender' => 'CLOUDSMS',

    /*
	|--------------------------------------------------------------------------
	| SENDER MODE
	|--------------------------------------------------------------------------
	|
	| SENDER MODE chosen to send the SMS
    | Credit will be deducted from the respective account
    |
    | 'shortcode' account for 5 digits number
    | 'longcode' account for 10 digits number
	|
	*/
    'mode'   => 'shortcode',

    /*
	|--------------------------------------------------------------------------
	| SMS CONTENT TYPE
	|--------------------------------------------------------------------------
	|
	| SMS content format
    |
    | ASCII: 1
    | UNICODE: 4
	|
	*/
    'format' => 1
);