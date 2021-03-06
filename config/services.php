<?php
$redir_url = $app->runningInConsole() ? getenv('FACEBOOK_REDIRECT_URL') : url(getenv('FACEBOOK_REDIRECT_URL'));

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'facebook' => [
            'client_id'         =>  getenv('FACEBOOK_APP_ID'),
            'client_secret'     =>  getenv('FACEBOOK_APP_SECRET'),
            'redirect'      	=>  $redir_url 
        ]

];
