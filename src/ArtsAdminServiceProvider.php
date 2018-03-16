<?php

namespace Vadiasov\ArtsAdmin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ArtsAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
//        $router->aliasMiddleware('arts-admin', \Vadiasov\ArtsAdmin\Middleware\ArtsMiddleware::class);
        
//        $this->publishes([__DIR__ . '/Config/artsAdmin.php' => config_path('artsAdmin.php'),], 'artsAdmin_config');
//        $this->publishes([__DIR__ . '/Assets' => public_path('vendor/arts-admin'),], 'arts-admin_assets');
//        $this->publishes(
//            [
//                __DIR__ . '/Translations' => resource_path('lang/vendor/arts-admin'),
//                __DIR__ . '/Views'        => resource_path('views/vendor/arts-admin'),
//            ]
//        );
        
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
//        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'artsAdmin');
        $this->loadViewsFrom(__DIR__ . '/Views', 'arts-admin');
        
//        if ($this->app->runningInConsole()) {
//            $this->commands([\Vadiasov\ArtsAdmin\Commands\ArtsCommand::class,]);
//        }
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__ . '/Config/artsAdmin.php', 'artsAdmin');
        $this->app->make('Vadiasov\ArtsAdmin\Controllers\ArtsController');
    }
}
