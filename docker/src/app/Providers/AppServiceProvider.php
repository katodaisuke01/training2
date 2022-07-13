<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\MailAttachmentRepositoryInterface::class,
            \App\Repositories\MailAttachmentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (request()->is('admin*')) {
            config(['session.cookie' => config('session.cookie_admin')]);
        } elseif (request()->is('worker*')) {
            config(['session.cookie' => config('session.cookie_worker')]);
        } elseif (request()->is('solaseed*')) {
            config(['session.cookie' => config('session.cookie_solaseed')]);
        } else {
            config(['session.cookie' => config('session.cookie_industry')]);
        }
    }
}
