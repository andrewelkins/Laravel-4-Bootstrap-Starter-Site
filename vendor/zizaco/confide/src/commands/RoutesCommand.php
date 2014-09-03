<?php namespace Zizaco\Confide;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RoutesCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'confide:routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Append the default Confide controller routes to the routes.php';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $app = app();
        $app['view']->addNamespace('confide',substr(__DIR__,0,-8).'views');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $name = $this->prepareName($this->option('controller'));
        $restful = $this->option('restful');

        $this->line('');
        $this->info( "Routes file: app/routes.php" );

        if(! $restful)
        {
            $message = "The default Confide routes (to use with the Controller template)".
            " will be appended to your routes.php file.";
        }
        else
        {
            $message = "A single route to handle every action in a RESTful controller".
            " will be appended to your routes.php file. This may be used with a confide".
            " controller generated using [-r|--restful] option.";
        }
        

        $this->comment( $message );
        $this->line('');

        if ( $this->confirm("Proceed with the append? [Yes|no]") )
        {
            $this->line('');

            $this->info( "Appending routes..." );
            if( $this->appendRoutes( $name, $restful ) )
            {
                $this->info( "app/routes.php Patched successfully!" );
            }
            else{
                $this->error( 
                    "Coudn't append content to app/routes.php\nCheck the".
                    " write permissions within the file."
                );
            }

            $this->line('');

        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        $app = app();

        return array(
            array('controller', null, InputOption::VALUE_OPTIONAL, 'Name of the controller.', $app['config']->get('auth.model')),
            array('--restful', '-r', InputOption::VALUE_NONE, 'Generate RESTful controller.'),
        );
    }

    /**
     * Prepare the controller name
     *
     * @param string  $name
     * @return string
     */
    protected function prepareName( $name = '' )
    {
        $name = ( $name != '') ? ucfirst($name) : 'User';
        
        if( substr($name,-10) == 'controller' )
        {
            $name = substr($name, 0, -10).'Controller';
        }
        else
        {
            $name .= 'Controller';
        }

        return $name;
    }

    /**
     * Create the controller
     *
     * @param  string $name
     * @return bool
     */
    protected function appendRoutes( $name = '', $restful = false )
    {        
        $app = app();
        $routes_file = $this->laravel->path.'/routes.php';
        $confide_routes = $app['view']->make('confide::generators.routes')
            ->with('name', $name)
            ->with('restful', $restful)
            ->render();

        if( file_exists( $routes_file ) )
        {
            $fs = fopen($routes_file, 'a');
            if ( $fs )
            {
                fwrite($fs, $confide_routes);
                $this->line($confide_routes);
                fclose($fs);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

}
