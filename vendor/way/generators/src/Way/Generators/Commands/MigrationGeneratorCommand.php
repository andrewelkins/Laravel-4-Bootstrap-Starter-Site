<?php namespace Way\Generators\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Way\Generators\Parsers\MigrationNameParser;
use Way\Generators\Parsers\MigrationFieldsParser;
use Way\Generators\Generator;
use Way\Generators\SchemaCreator;
use Config;

class MigrationGeneratorCommand extends GeneratorCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new migration';

    /**
     * @var \Way\Generators\ModelGenerator
     */
    protected $generator;

    /**
     * @var MigrationNameParser
     */
    private $migrationNameParser;

    /**
     * @var SchemaWriter
     */
    private $schemaCreator;

    /**
     * @param Generator $generator
     * @param MigrationNameParser $migrationNameParser
     * @param MigrationFieldsParser $migrationFieldsParser
     * @param SchemaCreator $schemaCreator
     */
    public function __construct(
        Generator $generator,
        MigrationNameParser $migrationNameParser,
        MigrationFieldsParser $migrationFieldsParser,
        SchemaCreator $schemaCreator
    )
    {
        $this->generator = $generator;
        $this->migrationNameParser = $migrationNameParser;
        $this->migrationFieldsParser = $migrationFieldsParser;
        $this->schemaCreator = $schemaCreator;

        parent::__construct($generator);
    }

    /**
     * Execute the console command
     */
    public function fire()
    {
        parent::fire();

        // Now that the file has been generated,
        // let's run dump-autoload to refresh everything
        if ( ! $this->option('testing'))
        {
            $this->call('dump-autoload');
        }
    }

    /**
     * The path where the file will be created
     *
     * @return mixed
     */
    protected function getFileGenerationPath()
    {
        $path = $this->getPathByOptionOrConfig('path', 'migration_target_path');
        $fileName = $this->getDatePrefix() . '_' . $this->argument('migrationName') . '.php';

        return "{$path}/{$fileName}";
    }

    /**
     * Get the date prefix for the migration.
     *
     * @return string
     */
    protected function getDatePrefix()
    {
        return date('Y_m_d_His');
    }

    /**
     * Fetch the template data
     *
     * @return array
     */
    protected function getTemplateData()
    {
        $migrationName = $this->argument('migrationName');

        // This will tell us the table name and action that we'll be performing
        $migrationData = $this->migrationNameParser->parse($migrationName);

        // We also need to parse the migration fields, if provided
        $fields = $this->migrationFieldsParser->parse($this->option('fields'));

        return [
            'CLASS' => ucwords(camel_case($migrationName)),
            'UP'    => $this->schemaCreator->up($migrationData, $fields),
            'DOWN'  => $this->schemaCreator->down($migrationData, $fields)
        ];
    }

    /**
     * Get path to template for generator
     *
     * @return mixed
     */
    protected function getTemplatePath()
    {
        return $this->getPathByOptionOrConfig('templatePath', 'migration_template_path');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('migrationName', InputArgument::REQUIRED, 'The migration name')
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            ['fields', null, InputOption::VALUE_OPTIONAL, 'Fields for the migration'],
            ['path', null, InputOption::VALUE_OPTIONAL, 'Where should the file be created?'],
            ['templatePath', null, InputOption::VALUE_OPTIONAL, 'The location of the template for this generator'],
            ['testing', null, InputOption::VALUE_OPTIONAL, 'For internal use only.']
        );
    }

}
