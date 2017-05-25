<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use SebastianBergmann\Version;

class VersionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Version $version
     * @return void
     */
    public function boot(Version $version)
    {
        View::share('flowGigVersion', $version->getVersion());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Version::class, function () {
            return new Version('0.0.0', base_path());
        });
    }
}
