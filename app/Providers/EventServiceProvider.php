<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

	'Illuminate\Auth\Events\Attempting' => [
		'App\Listeners\Auth\LogAuthenticationAttempt',
	],
	'Illuminate\Auth\Events\Authenticated' => [
		'App\Listeners\Auth\LogAuthenticated',
	],
	'Illuminate\Auth\Events\Login' => [
		'App\Listeners\Auth\LogSuccessfulLogin',
	],
	'Illuminate\Auth\Events\Failed' => [
		'App\Listeners\Auth\LogFailedLogin',
	],
	'Illuminate\Auth\Events\Logout' => [
		'App\Listeners\Auth\LogSuccessfulLogout',
	],
	'Illuminate\Auth\Events\Lockout' => [
		'App\Listeners\Auth\LogLockout',
	],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
