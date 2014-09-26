<?php namespace Zizaco\Confide;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MigrationCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'confide:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a migration following the Confide especifications.';

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
        $table = lcfirst($this->option('table'));

        $this->line('');
        $this->info( "Table name: $table" );
        $message = "A migration that creates the $table table will".
        " be created in app/database/migrations directory";

        $this->comment( $message );
        $this->line('');

        if ( $this->confirm("Proceed with the migration creation? [Yes|no]") )
        {
            $this->line('');

            $this->info( "Creating migration..." );
            if( $this->createMigration( $table ) )
            {
                $this->info( "Migration successfully created!" );
            }
            else{
                $this->error( 
                    "Coudn't create migration.\n Check the write permissions".
                    " within the app/database/migrations directory."
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
            array('table', null, InputOption::VALUE_OPTIONAL, 'Table name.', $app['config']->get('auth.table')),
        );
    }

    /**
     * Create the migration
     *
     * @param  string $name
     * @return bool
     */
    protected function createMigration( $table = 'users' )
    {
        $app = app();
        $migration_file = $this->laravel->path."/database/migrations/".date('Y_m_d_His')."_confide_setup_users_table.php";
        $output = $app['view']->make('confide::generators.migration')->with('table', $table)->render();

        if( ! file_exists( $migration_file ) )
        {
            $fs = fopen($migration_file, 'x');
            if ( $fs )
            {
                fwrite($fs, $output);
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
