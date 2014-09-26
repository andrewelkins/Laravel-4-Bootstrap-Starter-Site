<?php namespace Zizaco\Confide;

use Illuminate\Support\ServiceProvider;

class ConfideServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('zizaco/confide');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepository();

        $this->registerConfide();

        $this->registerCommands();   
    }

    /**
     * Register the repository that will handle all the database interaction.
     *
     * @return void
     */
    protected function registerRepository()
    {
        $this->app->bind('confide.repository', function($app)
        {
            return new ConfideEloquentRepository;
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    protected function registerConfide()
    {
        $this->app->bind('confide', function($app)
        {
            return new Confide($app->make('confide.repository'));
        });
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->app['command.confide.controller'] = $this->app->share(function($app)
        {
            return new ControllerCommand($app);
        });

        $this->app['command.confide.routes'] = $this->app->share(function($app)
        {
            return new RoutesCommand($app);
        });

        $this->app['command.confide.migration'] = $this->app->share(function($app)
        {
            return new MigrationCommand($app);
        });

        $this->commands(
            'command.confide.controller',
            'command.confide.routes',
            'command.confide.migration'
        );
    }

}
