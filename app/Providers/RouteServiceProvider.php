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

    protected $namespace_web_admin = 'App\Http\Controllers\Web\Admin';
    protected $namespace_web_hr = 'App\Http\Controllers\Web\HR';


    protected $namespace_api_admin = 'App\Http\Controllers\Api\Admin';
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

        $this->mapApiAdminRoutes();
        $this->mapApiHrRoutes();

        $this->mapWebRoutes();

        $this->mapWebAdminRoutes();
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

    protected function mapWebAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace_web_admin)
            ->group(base_path('routes/admin/web.php'));
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

    protected function mapApiAdminRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace_api_admin)
            ->group(base_path('routes/admin/api.php'));
    }

    protected function mapApiHrRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace_api_hr)
            ->group(base_path('routes/hr/api.php'));
    }
}
