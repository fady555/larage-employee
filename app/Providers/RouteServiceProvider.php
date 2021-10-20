<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $namespace_web_others = 'App\Http\Controllers\Web\Others';
    protected $namespace_web_hr = 'App\Http\Controllers\Web\HR';


    protected $namespace_api_others = 'App\Http\Controllers\Api\Others';
    protected $namespace_api_hr = 'App\Http\Controllers\Api\HR';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapApiOthersRoutes();
        $this->mapApiHrRoutes();

        $this->mapWebRoutes();

        $this->mapWebOthersRoutes();
        $this->mapWebHrRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapWebOthersRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace_web_others)
            ->group(base_path('routes/others/web.php'));
    }

    protected function mapWebHrRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace_web_hr)
            ->group(base_path('routes/hr/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapApiOthersRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace_api_others)
            ->group(base_path('routes/others/api.php'));
    }

    protected function mapApiHrRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace_api_hr)
            ->group(base_path('routes/hr/api.php'));
    }
}
