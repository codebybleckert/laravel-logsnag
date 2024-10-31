<?php

namespace Bleckert\LaravelLogsnag;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LaravelLogsnagServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('logsnag.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'logsnag');
        $this->app->singleton(Logsnag::class, fn () => new Logsnag);

        Event::listen(fn (Authenticated $event) => $this->app->make(Logsnag::class)->identify([
            'email' => $event->user->email,
        ]));
    }
}
