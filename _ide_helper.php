<?php
/**
 * An helper file for Laravel 4, to provide autocomplete information to your IDE
 * Generated with https://github.com/barryvdh/laravel-ide-helper
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */
namespace {
	die('Only to be used as an helper for your IDE');
}

namespace  {
 class App extends Illuminate\Support\Facades\App{
	/**
	 * @var \Illuminate\Foundation\Application $root
	 */
	 static private $root;

	/**
	 * Create a new Illuminate application instance.
	 *
	 * @static
	 * @param	\Illuminate\Http\Request	$request
	 * @return void
	 */
	 public static function __construct($request = null){
		 static::$root->__construct($request);
	 }

	/**
	 * Set the application request for the console environment.
	 *
	 * @static
	 * @return void
	 */
	 public static function setRequestForConsoleEnvironment(){
		 static::$root->setRequestForConsoleEnvironment();
	 }

	/**
	 * Redirect the request if it has a trailing slash.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|null
	 */
	 public static function redirectIfTrailingSlash(){
		return static::$root->redirectIfTrailingSlash();
	 }

	/**
	 * Bind the installation paths to the application.
	 *
	 * @static
	 * @param	array	$paths
	 * @return void
	 */
	 public static function bindInstallPaths($paths){
		 static::$root->bindInstallPaths($paths);
	 }

	/**
	 * Get the application bootstrap file.
	 *
	 * @static
	 * @return string
	 */
	 public static function getBootstrapFile(){
		return static::$root->getBootstrapFile();
	 }

	/**
	 * Start the exception handling for the request.
	 *
	 * @static
	 * @return void
	 */
	 public static function startExceptionHandling(){
		 static::$root->startExceptionHandling();
	 }

	/**
	 * Get the current application environment.
	 *
	 * @static
	 * @return string
	 */
	 public static function environment(){
		return static::$root->environment();
	 }

	/**
	 * Detect the application's current environment.
	 *
	 * @static
	 * @param	array|string	$environments
	 * @return string
	 */
	 public static function detectEnvironment($environments){
		return static::$root->detectEnvironment($environments);
	 }

	/**
	 * Determine if we are running in the console.
	 *
	 * @static
	 * @return bool
	 */
	 public static function runningInConsole(){
		return static::$root->runningInConsole();
	 }

	/**
	 * Determine if we are running unit tests.
	 *
	 * @static
	 * @return bool
	 */
	 public static function runningUnitTests(){
		return static::$root->runningUnitTests();
	 }

	/**
	 * Register a service provider with the application.
	 *
	 * @static
	 * @param	\Illuminate\Support\ServiceProvider|string	$provider
	 * @param	array	$options
	 * @return void
	 */
	 public static function register($provider, $options = array()){
		 static::$root->register($provider, $options);
	 }

	/**
	 * Load and boot all of the remaining deferred providers.
	 *
	 * @static
	 * @return void
	 */
	 public static function loadDeferredProviders(){
		 static::$root->loadDeferredProviders();
	 }

	/**
	 * Resolve the given type from the container.
	 * (Overriding Container::make)
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function make($abstract, $parameters = array()){
		return static::$root->make($abstract, $parameters);
	 }

	/**
	 * Register a "before" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function before($callback){
		 static::$root->before($callback);
	 }

	/**
	 * Register an "after" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function after($callback){
		 static::$root->after($callback);
	 }

	/**
	 * Register a "close" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function close($callback){
		 static::$root->close($callback);
	 }

	/**
	 * Register a "finish" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function finish($callback){
		 static::$root->finish($callback);
	 }

	/**
	 * Register a "shutdown" callback.
	 *
	 * @static
	 * @param	callable	$callback
	 * @return void
	 */
	 public static function shutdown($callback = null){
		 static::$root->shutdown($callback);
	 }

	/**
	 * Handles the given request and delivers the response.
	 *
	 * @static
	 * @return void
	 */
	 public static function run(){
		 static::$root->run();
	 }

	/**
	 * Handle the given request and get the response.
	 *
	 * @static
	 * @param	\Illuminate\Http\Request	$request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function dispatch($request){
		return static::$root->dispatch($request);
	 }

	/**
	 * Handle the given request and get the response.
	 * Provides compatibility with BrowserKit functional testing.
	 *
	 * @static
	 * @param	\Illuminate\Http\Request	$request
	 * @param	int	$type
	 * @param	bool	$catch
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function handle($request, $type = 1, $catch = true){
		return static::$root->handle($request, $type, $catch);
	 }

	/**
	 * Boot the application's service providers.
	 *
	 * @static
	 * @return void
	 */
	 public static function boot(){
		 static::$root->boot();
	 }

	/**
	 * Register a new boot listener.
	 *
	 * @static
	 * @param	mixed	$callback
	 * @return void
	 */
	 public static function booting($callback){
		 static::$root->booting($callback);
	 }

	/**
	 * Register a new "booted" listener.
	 *
	 * @static
	 * @param	mixed	$callback
	 * @return void
	 */
	 public static function booted($callback){
		 static::$root->booted($callback);
	 }

	/**
	 * Prepare the request by injecting any services.
	 *
	 * @static
	 * @param	\Illuminate\Http\Request	$request
	 * @return \Illuminate\Http\Request
	 */
	 public static function prepareRequest($request){
		return static::$root->prepareRequest($request);
	 }

	/**
	 * Prepare the given value as a Response object.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function prepareResponse($value){
		return static::$root->prepareResponse($value);
	 }

	/**
	 * Determine if the application is currently down for maintenance.
	 *
	 * @static
	 * @return bool
	 */
	 public static function isDownForMaintenance(){
		return static::$root->isDownForMaintenance();
	 }

	/**
	 * Register a maintenance mode event listener.
	 *
	 * @static
	 * @param	\Closure	$callback
	 * @return void
	 */
	 public static function down($callback){
		 static::$root->down($callback);
	 }

	/**
	 * Throw an HttpException with the given data.
	 *
	 * @static
	 * @param	int	$code
	 * @param	string	$message
	 * @param	array	$headers
	 * @return void
	 */
	 public static function abort($code, $message = '', $headers = array()){
		 static::$root->abort($code, $message, $headers);
	 }

	/**
	 * Register a 404 error handler.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function missing($callback){
		 static::$root->missing($callback);
	 }

	/**
	 * Register an application error handler.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function error($callback){
		 static::$root->error($callback);
	 }

	/**
	 * Register an error handler for fatal errors.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function fatal($callback){
		 static::$root->fatal($callback);
	 }

	/**
	 * Get the configuration loader instance.
	 *
	 * @static
	 * @return \Illuminate\Config\LoaderInterface
	 */
	 public static function getConfigLoader(){
		return static::$root->getConfigLoader();
	 }

	/**
	 * Get the service provider repository instance.
	 *
	 * @static
	 * @return \Illuminate\Foundation\ProviderRepository
	 */
	 public static function getProviderRepository(){
		return static::$root->getProviderRepository();
	 }

	/**
	 * Set the current application locale.
	 *
	 * @static
	 * @param	string	$locale
	 * @return void
	 */
	 public static function setLocale($locale){
		 static::$root->setLocale($locale);
	 }

	/**
	 * Get the service providers that have been loaded.
	 *
	 * @static
	 * @return array
	 */
	 public static function getLoadedProviders(){
		return static::$root->getLoadedProviders();
	 }

	/**
	 * Set the application's deferred services.
	 *
	 * @static
	 * @param	array	$services
	 * @return void
	 */
	 public static function setDeferredServices($services){
		 static::$root->setDeferredServices($services);
	 }

	/**
	 * Dynamically access application services.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function __get($key){
		return static::$root->__get($key);
	 }

	/**
	 * Dynamically set application services.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function __set($key, $value){
		 static::$root->__set($key, $value);
	 }

	/**
	 * Determine if the given abstract type has been bound.
	 *
	 * @static
	 * @param	string	$abstract
	 * @return bool
	 */
	 public static function bound($abstract){
		return static::$root->bound($abstract);
	 }

	/**
	 * Register a binding with the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 * @param	bool	$shared
	 * @return void
	 */
	 public static function bind($abstract, $concrete = null, $shared = false){
		 static::$root->bind($abstract, $concrete, $shared);
	 }

	/**
	 * Register a binding if it hasn't already been registered.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 * @param	bool	$shared
	 * @return bool
	 */
	 public static function bindIf($abstract, $concrete = null, $shared = false){
		return static::$root->bindIf($abstract, $concrete, $shared);
	 }

	/**
	 * Register a shared binding in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 * @return void
	 */
	 public static function singleton($abstract, $concrete = null){
		 static::$root->singleton($abstract, $concrete);
	 }

	/**
	 * Wrap a Closure such that it is shared.
	 *
	 * @static
	 * @param	Closure	$closure
	 * @return Closure
	 */
	 public static function share($closure){
		return static::$root->share($closure);
	 }

	/**
	 * "Extend" an abstract type in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure	$closure
	 * @return void
	 */
	 public static function extend($abstract, $closure){
		 static::$root->extend($abstract, $closure);
	 }

	/**
	 * Register an existing instance as shared in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	mixed	$instance
	 * @return void
	 */
	 public static function instance($abstract, $instance){
		 static::$root->instance($abstract, $instance);
	 }

	/**
	 * Alias a type to a shorter name.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	string	$alias
	 * @return void
	 */
	 public static function alias($abstract, $alias){
		 static::$root->alias($abstract, $alias);
	 }

	/**
	 * Instantiate a concrete instance of the given type.
	 *
	 * @static
	 * @param	string	$concrete
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function build($concrete, $parameters = array()){
		return static::$root->build($concrete, $parameters);
	 }

	/**
	 * Register a new resolving callback.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function resolving($callback){
		 static::$root->resolving($callback);
	 }

	/**
	 * Get the container's bindings.
	 *
	 * @static
	 * @return array
	 */
	 public static function getBindings(){
		return static::$root->getBindings();
	 }

	/**
	 * Determine if a given offset exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return static::$root->offsetExists($key);
	 }

	/**
	 * Get the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function offsetGet($key){
		return static::$root->offsetGet($key);
	 }

	/**
	 * Set the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function offsetSet($key, $value){
		 static::$root->offsetSet($key, $value);
	 }

	/**
	 * Unset the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function offsetUnset($key){
		 static::$root->offsetUnset($key);
	 }

 }
}

namespace  {
 class Artisan extends Illuminate\Support\Facades\Artisan{
	/**
	 * @var \Illuminate\Console\Application $root
	 */
	 static private $root;

	/**
	 * Start a new Console application.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$app
	 * @return \Illuminate\Console\Application
	 */
	 public static function start($app){
		return static::$root->start($app);
	 }

	/**
	 * Add a command to the console.
	 *
	 * @static
	 * @param	\Symfony\Component\Console\Command\Command	$command
	 * @return \Symfony\Component\Console\Command\Command
	 */
	 public static function add($command){
		return static::$root->add($command);
	 }

	/**
	 * Add a command, resolving through the application.
	 *
	 * @static
	 * @param	string	$command
	 * @return void
	 */
	 public static function resolve($command){
		 static::$root->resolve($command);
	 }

	/**
	 * Resolve an array of commands through the application.
	 *
	 * @static
	 * @param	array|dynamic	$commands
	 * @return void
	 */
	 public static function resolveCommands($commands){
		 static::$root->resolveCommands($commands);
	 }

	/**
	 * Render the given exception.
	 *
	 * @static
	 * @param	Exception	$e
	 * @param	\Symfony\Component\Console\Output\OutputInterface	$output
	 * @return void
	 */
	 public static function renderException($e, $output){
		 static::$root->renderException($e, $output);
	 }

	/**
	 * Set the exception handler instance.
	 *
	 * @static
	 * @param	\Illuminate\Exception\Handler	$handler
	 * @return void
	 */
	 public static function setExceptionHandler($handler){
		 static::$root->setExceptionHandler($handler);
	 }

	/**
	 * Set the Laravel application instance.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$laravel
	 * @return void
	 */
	 public static function setLaravel($laravel){
		 static::$root->setLaravel($laravel);
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	string $name	The name of the application
	 * @param	string $version The version of the application
	 * @return void
	 */
	 public static function __construct($name = 'UNKNOWN', $version = 'UNKNOWN'){
		 static::$root->__construct($name, $version);
	 }

	/**
	 * 
	 *
	 * @static
	 * @return void
	 */
	 public static function setDispatcher($dispatcher){
		 static::$root->setDispatcher($dispatcher);
	 }

	/**
	 * Runs the current application.
	 *
	 * @static
	 * @param	InputInterface	$input	An Input instance
	 * @param	OutputInterface $output An Output instance
	 * @return integer 0 if everything went fine, or an error code
	 */
	 public static function run($input = null, $output = null){
		return static::$root->run($input, $output);
	 }

	/**
	 * Runs the current application.
	 *
	 * @static
	 * @param	InputInterface	$input	An Input instance
	 * @param	OutputInterface $output An Output instance
	 * @return integer 0 if everything went fine, or an error code
	 */
	 public static function doRun($input, $output){
		return static::$root->doRun($input, $output);
	 }

	/**
	 * Set a helper set to be used with the command.
	 *
	 * @static
	 * @param	HelperSet $helperSet The helper set
	 * @return void
	 */
	 public static function setHelperSet($helperSet){
		 static::$root->setHelperSet($helperSet);
	 }

	/**
	 * Get the helper set associated with the command.
	 *
	 * @static
	 * @return HelperSet The HelperSet instance associated with this command
	 */
	 public static function getHelperSet(){
		return static::$root->getHelperSet();
	 }

	/**
	 * Set an input definition set to be used with this application
	 *
	 * @static
	 * @param	InputDefinition $definition The input definition
	 * @return void
	 */
	 public static function setDefinition($definition){
		 static::$root->setDefinition($definition);
	 }

	/**
	 * Gets the InputDefinition related to this Application.
	 *
	 * @static
	 * @return InputDefinition The InputDefinition instance
	 */
	 public static function getDefinition(){
		return static::$root->getDefinition();
	 }

	/**
	 * Gets the help message.
	 *
	 * @static
	 * @return string A help message.
	 */
	 public static function getHelp(){
		return static::$root->getHelp();
	 }

	/**
	 * Sets whether to catch exceptions or not during commands execution.
	 *
	 * @static
	 * @param	Boolean $boolean Whether to catch exceptions or not during commands execution
	 * @return void
	 */
	 public static function setCatchExceptions($boolean){
		 static::$root->setCatchExceptions($boolean);
	 }

	/**
	 * Sets whether to automatically exit after a command execution or not.
	 *
	 * @static
	 * @param	Boolean $boolean Whether to automatically exit after a command execution or not
	 * @return void
	 */
	 public static function setAutoExit($boolean){
		 static::$root->setAutoExit($boolean);
	 }

	/**
	 * Gets the name of the application.
	 *
	 * @static
	 * @return string The application name
	 */
	 public static function getName(){
		return static::$root->getName();
	 }

	/**
	 * Sets the application name.
	 *
	 * @static
	 * @param	string $name The application name
	 * @return void
	 */
	 public static function setName($name){
		 static::$root->setName($name);
	 }

	/**
	 * Gets the application version.
	 *
	 * @static
	 * @return string The application version
	 */
	 public static function getVersion(){
		return static::$root->getVersion();
	 }

	/**
	 * Sets the application version.
	 *
	 * @static
	 * @param	string $version The application version
	 * @return void
	 */
	 public static function setVersion($version){
		 static::$root->setVersion($version);
	 }

	/**
	 * Returns the long version of the application.
	 *
	 * @static
	 * @return string The long application version
	 */
	 public static function getLongVersion(){
		return static::$root->getLongVersion();
	 }

	/**
	 * Registers a new command.
	 *
	 * @static
	 * @param	string $name The command name
	 * @return Command The newly created command
	 */
	 public static function register($name){
		return static::$root->register($name);
	 }

	/**
	 * Adds an array of command objects.
	 *
	 * @static
	 * @param	Command[] $commands An array of commands
	 * @return void
	 */
	 public static function addCommands($commands){
		 static::$root->addCommands($commands);
	 }

	/**
	 * Returns a registered command by name or alias.
	 *
	 * @static
	 * @param	string $name The command name or alias
	 * @return Command A Command object
	 */
	 public static function get($name){
		return static::$root->get($name);
	 }

	/**
	 * Returns true if the command exists, false otherwise.
	 *
	 * @static
	 * @param	string $name The command name or alias
	 * @return Boolean true if the command exists, false otherwise
	 */
	 public static function has($name){
		return static::$root->has($name);
	 }

	/**
	 * Returns an array of all unique namespaces used by currently registered commands.
	 * It does not returns the global namespace which always exists.
	 *
	 * @static
	 * @return array An array of namespaces
	 */
	 public static function getNamespaces(){
		return static::$root->getNamespaces();
	 }

	/**
	 * Finds a registered namespace by a name or an abbreviation.
	 *
	 * @static
	 * @param	string $namespace A namespace or abbreviation to search for
	 * @return string A registered namespace
	 */
	 public static function findNamespace($namespace){
		return static::$root->findNamespace($namespace);
	 }

	/**
	 * Finds a command by name or alias.
	 * Contrary to get, this command tries to find the best
	 * match if you give it an abbreviation of a name or alias.
	 *
	 * @static
	 * @param	string $name A command name or a command alias
	 * @return Command A Command instance
	 */
	 public static function find($name){
		return static::$root->find($name);
	 }

	/**
	 * Gets the commands (registered in the given namespace if provided).
	 * The array keys are the full names and the values the command instances.
	 *
	 * @static
	 * @param	string $namespace A namespace name
	 * @return Command[] An array of Command instances
	 */
	 public static function all($namespace = null){
		return static::$root->all($namespace);
	 }

	/**
	 * Returns an array of possible abbreviations given a set of names.
	 *
	 * @static
	 * @param	array $names An array of names
	 * @return array An array of abbreviations
	 */
	 public static function getAbbreviations($names){
		return static::$root->getAbbreviations($names);
	 }

	/**
	 * Returns a text representation of the Application.
	 *
	 * @static
	 * @param	string	$namespace An optional namespace name
	 * @param	boolean $raw	Whether to return raw command list
	 * @return string A string representing the Application
	 */
	 public static function asText($namespace = null, $raw = false){
		return static::$root->asText($namespace, $raw);
	 }

	/**
	 * Returns an XML representation of the Application.
	 *
	 * @static
	 * @param	string	$namespace An optional namespace name
	 * @param	Boolean $asDom	Whether to return a DOM or an XML string
	 * @return string|\DOMDocument An XML string representing the Application
	 */
	 public static function asXml($namespace = null, $asDom = false){
		return static::$root->asXml($namespace, $asDom);
	 }

	/**
	 * Tries to figure out the terminal dimensions based on the current environment
	 *
	 * @static
	 * @return array Array containing width and height
	 */
	 public static function getTerminalDimensions(){
		return static::$root->getTerminalDimensions();
	 }

	/**
	 * Returns the namespace part of the command name.
	 * This method is not part of public API and should not be used directly.
	 *
	 * @static
	 * @param	string $name	The full name of the command
	 * @param	string $limit The maximum number of parts of the namespace
	 * @return string The namespace of the command
	 */
	 public static function extractNamespace($name, $limit = null){
		return static::$root->extractNamespace($name, $limit);
	 }

 }
}

namespace  {
 class Auth extends Illuminate\Support\Facades\Auth{
	/**
	 * @var \Illuminate\Auth\AuthManager $root
	 */
	 static private $root;

	/**
	 * Create an instance of the Eloquent driver.
	 *
	 * @static
	 * @return \Illuminate\Auth\Guard
	 */
	 public static function createEloquentDriver(){
		return static::$root->createEloquentDriver();
	 }

	/**
	 * Create a new manager instance.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$app
	 * @return void
	 */
	 public static function __construct($app){
		 static::$root->__construct($app);
	 }

	/**
	 * Get a driver instance.
	 *
	 * @static
	 * @param	string	$driver
	 * @return mixed
	 */
	 public static function driver($driver = null){
		return static::$root->driver($driver);
	 }

	/**
	 * Register a custom driver creator Closure.
	 *
	 * @static
	 * @param	string	$driver
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function extend($driver, $callback){
		 static::$root->extend($driver, $callback);
	 }

	/**
	 * Get all of the created "drivers".
	 *
	 * @static
	 * @return array
	 */
	 public static function getDrivers(){
		return static::$root->getDrivers();
	 }

	/**
	 * Dynamically call the default driver instance.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

	/**
	 * @var \Illuminate\Auth\Guard $root2
	 */
	 static private $root2;

	/**
	 * Determine if the current user is authenticated.
	 *
	 * @static
	 * @return bool
	 */
	 public static function check(){
		return static::$root2->check();
	 }

	/**
	 * Determine if the current user is a guest.
	 *
	 * @static
	 * @return bool
	 */
	 public static function guest(){
		return static::$root2->guest();
	 }

	/**
	 * Get the currently authenticated user.
	 *
	 * @static
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	 public static function user(){
		return static::$root2->user();
	 }

	/**
	 * Log a user into the application without sessions or cookies.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return bool
	 */
	 public static function once($credentials = array()){
		return static::$root2->once($credentials);
	 }

	/**
	 * Validate a user's credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return bool
	 */
	 public static function validate($credentials = array()){
		return static::$root2->validate($credentials);
	 }

	/**
	 * Attempt to authenticate using HTTP Basic Auth.
	 *
	 * @static
	 * @param	string	$field
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return \Symfony\Component\HttpFoundation\Response|null
	 */
	 public static function basic($field = 'email', $request = null){
		return static::$root2->basic($field, $request);
	 }

	/**
	 * Perform a stateless HTTP Basic login attempt.
	 *
	 * @static
	 * @param	string	$field
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return \Symfony\Component\HttpFoundation\Response|null
	 */
	 public static function onceBasic($field = 'email', $request = null){
		return static::$root2->onceBasic($field, $request);
	 }

	/**
	 * Attempt to authenticate a user using the given credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	bool	$remember
	 * @param	bool	$login
	 * @return bool
	 */
	 public static function attempt($credentials = array(), $remember = false, $login = true){
		return static::$root2->attempt($credentials, $remember, $login);
	 }

	/**
	 * Register an authentication attempt event listener.
	 *
	 * @static
	 * @param	mixed	$callback
	 * @return void
	 */
	 public static function attempting($callback){
		 static::$root2->attempting($callback);
	 }

	/**
	 * Log a user into the application.
	 *
	 * @static
	 * @param	\Illuminate\Auth\UserInterface	$user
	 * @param	bool	$remember
	 * @return void
	 */
	 public static function login($user, $remember = false){
		 static::$root2->login($user, $remember);
	 }

	/**
	 * Log the given user ID into the application.
	 *
	 * @static
	 * @param	mixed	$id
	 * @param	bool	$remember
	 * @return \Illuminate\Auth\UserInterface
	 */
	 public static function loginUsingId($id, $remember = false){
		return static::$root2->loginUsingId($id, $remember);
	 }

	/**
	 * Log the user out of the application.
	 *
	 * @static
	 * @return void
	 */
	 public static function logout(){
		 static::$root2->logout();
	 }

	/**
	 * Get the cookies queued by the guard.
	 *
	 * @static
	 * @return array
	 */
	 public static function getQueuedCookies(){
		return static::$root2->getQueuedCookies();
	 }

	/**
	 * Get the cookie creator instance used by the guard.
	 *
	 * @static
	 * @return \Illuminate\Cookie\CookieJar
	 */
	 public static function getCookieJar(){
		return static::$root2->getCookieJar();
	 }

	/**
	 * Set the cookie creator instance used by the guard.
	 *
	 * @static
	 * @param	\Illuminate\Cookie\CookieJar	$cookie
	 * @return void
	 */
	 public static function setCookieJar($cookie){
		 static::$root2->setCookieJar($cookie);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return \Illuminate\Events\Dispatcher
	 */
	 public static function getDispatcher(){
		return static::$root2->getDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	\Illuminate\Events\Dispatcher
	 * @return void
	 */
	 public static function setDispatcher($events){
		 static::$root2->setDispatcher($events);
	 }

	/**
	 * Get the session store used by the guard.
	 *
	 * @static
	 * @return \Illuminate\Session\Store
	 */
	 public static function getSession(){
		return static::$root2->getSession();
	 }

	/**
	 * Get the user provider used by the guard.
	 *
	 * @static
	 * @return \Illuminate\Auth\UserProviderInterface
	 */
	 public static function getProvider(){
		return static::$root2->getProvider();
	 }

	/**
	 * Return the currently cached user of the application.
	 *
	 * @static
	 * @return \Illuminate\Auth\UserInterface|null
	 */
	 public static function getUser(){
		return static::$root2->getUser();
	 }

	/**
	 * Set the current user of the application.
	 *
	 * @static
	 * @param	\Illuminate\Auth\UserInterface	$user
	 * @return void
	 */
	 public static function setUser($user){
		 static::$root2->setUser($user);
	 }

	/**
	 * Get the current request instance.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return static::$root2->getRequest();
	 }

	/**
	 * Set the current request instance.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request
	 * @return \Illuminate\Auth\Guard
	 */
	 public static function setRequest($request){
		return static::$root2->setRequest($request);
	 }

	/**
	 * Get a unique identifier for the auth session value.
	 *
	 * @static
	 * @return string
	 */
	 public static function getName(){
		return static::$root2->getName();
	 }

	/**
	 * Get the name of the cookie used to store the "recaller".
	 *
	 * @static
	 * @return string
	 */
	 public static function getRecallerName(){
		return static::$root2->getRecallerName();
	 }

 }
}

namespace  {
 class Blade extends Illuminate\Support\Facades\Blade{
	/**
	 * @var \Illuminate\View\Compilers\BladeCompiler $root
	 */
	 static private $root;

	/**
	 * Compile the view at the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @return void
	 */
	 public static function compile($path){
		 static::$root->compile($path);
	 }

	/**
	 * Compile the given Blade template contents.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function compileString($value){
		return static::$root->compileString($value);
	 }

	/**
	 * Register a custom Blade compiler.
	 *
	 * @static
	 * @param	Closure	$compiler
	 * @return void
	 */
	 public static function extend($compiler){
		 static::$root->extend($compiler);
	 }

	/**
	 * Get the regular expression for a generic Blade function.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createMatcher($function){
		return static::$root->createMatcher($function);
	 }

	/**
	 * Get the regular expression for a generic Blade function.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createOpenMatcher($function){
		return static::$root->createOpenMatcher($function);
	 }

	/**
	 * Create a plain Blade matcher.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createPlainMatcher($function){
		return static::$root->createPlainMatcher($function);
	 }

	/**
	 * Sets the content tags used for the compiler.
	 *
	 * @static
	 * @param	string	$openTag
	 * @param	string	$closeTag
	 * @param	bool	$escaped
	 * @return void
	 */
	 public static function setContentTags($openTag, $closeTag, $escaped = false){
		 static::$root->setContentTags($openTag, $closeTag, $escaped);
	 }

	/**
	 * Sets the escaped content tags used for the compiler.
	 *
	 * @static
	 * @param	string	$openTag
	 * @param	string	$closeTag
	 * @return void
	 */
	 public static function setEscapedContentTags($openTag, $closeTag){
		 static::$root->setEscapedContentTags($openTag, $closeTag);
	 }

	/**
	 * Create a new compiler instance.
	 *
	 * @static
	 * @param	\Illuminate\Filesystem\Filesystem	$files
	 * @param	string	$cachePath
	 * @return void
	 */
	 public static function __construct($files, $cachePath){
		 static::$root->__construct($files, $cachePath);
	 }

	/**
	 * Get the path to the compiled version of a view.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function getCompiledPath($path){
		return static::$root->getCompiledPath($path);
	 }

	/**
	 * Determine if the view at the given path is expired.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function isExpired($path){
		return static::$root->isExpired($path);
	 }

 }
}

namespace  {
 class Cache extends Illuminate\Support\Facades\Cache{
	/**
	 * @var \Illuminate\Cache\CacheManager $root
	 */
	 static private $root;

	/**
	 * Create a new manager instance.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$app
	 * @return void
	 */
	 public static function __construct($app){
		 static::$root->__construct($app);
	 }

	/**
	 * Get a driver instance.
	 *
	 * @static
	 * @param	string	$driver
	 * @return mixed
	 */
	 public static function driver($driver = null){
		return static::$root->driver($driver);
	 }

	/**
	 * Register a custom driver creator Closure.
	 *
	 * @static
	 * @param	string	$driver
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function extend($driver, $callback){
		 static::$root->extend($driver, $callback);
	 }

	/**
	 * Get all of the created "drivers".
	 *
	 * @static
	 * @return array
	 */
	 public static function getDrivers(){
		return static::$root->getDrivers();
	 }

	/**
	 * Dynamically call the default driver instance.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

	/**
	 * @var \Illuminate\Cache\StoreInterface $root2
	 */
	 static private $root2;

	/**
	 * Retrieve an item from the cache by key.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function get($key){
		return static::$root2->get($key);
	 }

	/**
	 * Store an item in the cache for a given number of minutes.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @param	int	$minutes
	 * @return void
	 */
	 public static function put($key, $value, $minutes){
		 static::$root2->put($key, $value, $minutes);
	 }

	/**
	 * Increment the value of an item in the cache.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function increment($key, $value = 1){
		 static::$root2->increment($key, $value);
	 }

	/**
	 * Decrement the value of an item in the cache.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function decrement($key, $value = 1){
		 static::$root2->decrement($key, $value);
	 }

	/**
	 * Store an item in the cache indefinitely.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function forever($key, $value){
		 static::$root2->forever($key, $value);
	 }

	/**
	 * Remove an item from the cache.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function forget($key){
		 static::$root2->forget($key);
	 }

	/**
	 * Remove all items from the cache.
	 *
	 * @static
	 * @return void
	 */
	 public static function flush(){
		 static::$root2->flush();
	 }

	/**
	 * Get the cache key prefix.
	 *
	 * @static
	 * @return string
	 */
	 public static function getPrefix(){
		return static::$root2->getPrefix();
	 }

	/**
	 * @var \Illuminate\Cache\Repository $root3
	 */
	 static private $root3;

	/**
	 * Determine if an item exists in the cache.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return static::$root3->has($key);
	 }

	/**
	 * Store an item in the cache if the key does not exist.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @param	int	$minutes
	 * @return void
	 */
	 public static function add($key, $value, $minutes){
		 static::$root3->add($key, $value, $minutes);
	 }

	/**
	 * Get an item from the cache, or store the default value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	int	$minutes
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function remember($key, $minutes, $callback){
		return static::$root3->remember($key, $minutes, $callback);
	 }

	/**
	 * Get an item from the cache, or store the default value forever.
	 *
	 * @static
	 * @param	string	$key
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function sear($key, $callback){
		return static::$root3->sear($key, $callback);
	 }

	/**
	 * Get an item from the cache, or store the default value forever.
	 *
	 * @static
	 * @param	string	$key
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function rememberForever($key, $callback){
		return static::$root3->rememberForever($key, $callback);
	 }

	/**
	 * Get the default cache time.
	 *
	 * @static
	 * @return int
	 */
	 public static function getDefaultCacheTime(){
		return static::$root3->getDefaultCacheTime();
	 }

	/**
	 * Set the default cache time in minutes.
	 *
	 * @static
	 * @param	int	$minutes
	 * @return void
	 */
	 public static function setDefaultCacheTime($minutes){
		 static::$root3->setDefaultCacheTime($minutes);
	 }

	/**
	 * Get the cache store implementation.
	 *
	 * @static
	 * @return \Illuminate\Cache\StoreInterface
	 */
	 public static function getStore(){
		return static::$root3->getStore();
	 }

	/**
	 * Determine if a cached value exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return static::$root3->offsetExists($key);
	 }

	/**
	 * Retrieve an item from the cache by key.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function offsetGet($key){
		return static::$root3->offsetGet($key);
	 }

	/**
	 * Store an item in the cache for the default time.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function offsetSet($key, $value){
		 static::$root3->offsetSet($key, $value);
	 }

	/**
	 * Remove an item from the cache.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function offsetUnset($key){
		 static::$root3->offsetUnset($key);
	 }

 }
}

namespace  {
 class ClassLoader{
	/**
	 * @var \Illuminate\Support\ClassLoader $root
	 */
	 static private $root;

	/**
	 * Load the given class file.
	 *
	 * @static
	 * @param	string	$class
	 * @return void
	 */
	 public static function load($class){
		 static::$root->load($class);
	 }

	/**
	 * Get the normal file name for a class.
	 *
	 * @static
	 * @param	string	$class
	 * @return string
	 */
	 public static function normalizeClass($class){
		return static::$root->normalizeClass($class);
	 }

	/**
	 * Register the given class loader on the auto-loader stack.
	 *
	 * @static
	 * @return void
	 */
	 public static function register(){
		 static::$root->register();
	 }

	/**
	 * Add directories to the class loader.
	 *
	 * @static
	 * @param	string|array	$directories
	 * @return void
	 */
	 public static function addDirectories($directories){
		 static::$root->addDirectories($directories);
	 }

	/**
	 * Remove directories from the class loader.
	 *
	 * @static
	 * @param	string|array	$directories
	 * @return void
	 */
	 public static function removeDirectories($directories = null){
		 static::$root->removeDirectories($directories);
	 }

	/**
	 * Gets all the directories registered with the loader.
	 *
	 * @static
	 * @return array
	 */
	 public static function getDirectories(){
		return static::$root->getDirectories();
	 }

 }
}

namespace  {
 class Config extends Illuminate\Support\Facades\Config{
	/**
	 * @var \Illuminate\Config\Repository $root
	 */
	 static private $root;

	/**
	 * Create a new configuration repository.
	 *
	 * @static
	 * @param	\Illuminate\Config\LoaderInterface	$loader
	 * @param	string	$environment
	 * @return void
	 */
	 public static function __construct($loader, $environment){
		 static::$root->__construct($loader, $environment);
	 }

	/**
	 * Determine if the given configuration value exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return static::$root->has($key);
	 }

	/**
	 * Determine if a configuration group exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasGroup($key){
		return static::$root->hasGroup($key);
	 }

	/**
	 * Get the specified configuration value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function get($key, $default = null){
		return static::$root->get($key, $default);
	 }

	/**
	 * Set a given configuration value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function set($key, $value){
		 static::$root->set($key, $value);
	 }

	/**
	 * Register a package for cascading configuration.
	 *
	 * @static
	 * @param	string	$package
	 * @param	string	$hint
	 * @param	string	$namespace
	 * @return void
	 */
	 public static function package($package, $hint, $namespace = null){
		 static::$root->package($package, $hint, $namespace);
	 }

	/**
	 * Register an after load callback for a given namespace.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function afterLoading($namespace, $callback){
		 static::$root->afterLoading($namespace, $callback);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$hint
	 * @return void
	 */
	 public static function addNamespace($namespace, $hint){
		 static::$root->addNamespace($namespace, $hint);
	 }

	/**
	 * Returns all registered namespaces with the config
	 * loader.
	 *
	 * @static
	 * @return array
	 */
	 public static function getNamespaces(){
		return static::$root->getNamespaces();
	 }

	/**
	 * Get the loader implementation.
	 *
	 * @static
	 * @return \Illuminate\Config\LoaderInterface
	 */
	 public static function getLoader(){
		return static::$root->getLoader();
	 }

	/**
	 * Set the loader implementation.
	 *
	 * @static
	 * @param	\Illuminate\Config\LoaderInterface	$loader
	 * @return void
	 */
	 public static function setLoader($loader){
		 static::$root->setLoader($loader);
	 }

	/**
	 * Get the current configuration environment.
	 *
	 * @static
	 * @return string
	 */
	 public static function getEnvironment(){
		return static::$root->getEnvironment();
	 }

	/**
	 * Get the after load callback array.
	 *
	 * @static
	 * @return array
	 */
	 public static function getAfterLoadCallbacks(){
		return static::$root->getAfterLoadCallbacks();
	 }

	/**
	 * Get all of the configuration items.
	 *
	 * @static
	 * @return array
	 */
	 public static function getItems(){
		return static::$root->getItems();
	 }

	/**
	 * Determine if the given configuration option exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return static::$root->offsetExists($key);
	 }

	/**
	 * Get a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetGet($key){
		return static::$root->offsetGet($key);
	 }

	/**
	 * Set a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$value
	 * @return void
	 */
	 public static function offsetSet($key, $value){
		 static::$root->offsetSet($key, $value);
	 }

	/**
	 * Unset a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function offsetUnset($key){
		 static::$root->offsetUnset($key);
	 }

	/**
	 * Parse a key into namespace, group, and item.
	 *
	 * @static
	 * @param	string	$key
	 * @return array
	 */
	 public static function parseKey($key){
		return static::$root->parseKey($key);
	 }

	/**
	 * Set the parsed value of a key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$parsed
	 * @return void
	 */
	 public static function setParsedKey($key, $parsed){
		 static::$root->setParsedKey($key, $parsed);
	 }

 }
}

namespace  {
 class Controller{
	/**
	 * @var \Illuminate\Routing\Controllers\Controller $root
	 */
	 static private $root;

	/**
	 * Register a new "before" filter on the controller.
	 *
	 * @static
	 * @param	string	$filter
	 * @param	array	$options
	 * @return void
	 */
	 public static function beforeFilter($filter, $options = array()){
		 static::$root->beforeFilter($filter, $options);
	 }

	/**
	 * Register a new "after" filter on the controller.
	 *
	 * @static
	 * @param	string	$filter
	 * @param	array	$options
	 * @return void
	 */
	 public static function afterFilter($filter, $options = array()){
		 static::$root->afterFilter($filter, $options);
	 }

	/**
	 * Execute an action on the controller.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @param	\Illuminate\Routing\Router	$router
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function callAction($container, $router, $method, $parameters){
		return static::$root->callAction($container, $router, $method, $parameters);
	 }

	/**
	 * Get the code registered filters.
	 *
	 * @static
	 * @return array
	 */
	 public static function getControllerFilters(){
		return static::$root->getControllerFilters();
	 }

	/**
	 * Handle calls to missing methods on the controller.
	 *
	 * @static
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function missingMethod($parameters){
		return static::$root->missingMethod($parameters);
	 }

	/**
	 * Handle calls to missing methods on the controller.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

 }
}

namespace  {
 class Cookie extends Illuminate\Support\Facades\Cookie{
	/**
	 * @var \Illuminate\Cookie\CookieJar $root
	 */
	 static private $root;

	/**
	 * Create a new cookie manager instance.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @param	\Illuminate\Encryption\Encrypter	$encrypter
	 * @return void
	 */
	 public static function __construct($request, $encrypter){
		 static::$root->__construct($request, $encrypter);
	 }

	/**
	 * Determine if a cookie exists and is not null.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return static::$root->has($key);
	 }

	/**
	 * Get the value of the given cookie.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function get($key, $default = null){
		return static::$root->get($key, $default);
	 }

	/**
	 * Create a new cookie instance.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	int	$minutes
	 * @param	string	$path
	 * @param	string	$domain
	 * @param	bool	$secure
	 * @param	bool	$httpOnly
	 * @return \Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = false, $httpOnly = true){
		return static::$root->make($name, $value, $minutes, $path, $domain, $secure, $httpOnly);
	 }

	/**
	 * Create a cookie that lasts "forever" (five years).
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	string	$path
	 * @param	string	$domain
	 * @param	bool	$secure
	 * @param	bool	$httpOnly
	 * @return \Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function forever($name, $value, $path = null, $domain = null, $secure = false, $httpOnly = true){
		return static::$root->forever($name, $value, $path, $domain, $secure, $httpOnly);
	 }

	/**
	 * Expire the given cookie.
	 *
	 * @static
	 * @param	string	$name
	 * @return \Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function forget($name){
		return static::$root->forget($name);
	 }

	/**
	 * Set the default path and domain for the jar.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$domain
	 * @return void
	 */
	 public static function setDefaultPathAndDomain($path, $domain){
		 static::$root->setDefaultPathAndDomain($path, $domain);
	 }

	/**
	 * Get the request instance.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return static::$root->getRequest();
	 }

	/**
	 * Get the encrypter instance.
	 *
	 * @static
	 * @return \Illuminate\Encryption\Encrypter
	 */
	 public static function getEncrypter(){
		return static::$root->getEncrypter();
	 }

 }
}

namespace  {
 class Crypt extends Illuminate\Support\Facades\Crypt{
	/**
	 * @var \Illuminate\Encryption\Encrypter $root
	 */
	 static private $root;

	/**
	 * Create a new encrypter instance.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function __construct($key){
		 static::$root->__construct($key);
	 }

	/**
	 * Encrypt the given value.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function encrypt($value){
		return static::$root->encrypt($value);
	 }

	/**
	 * Decrypt the given value.
	 *
	 * @static
	 * @param	string	$payload
	 * @return string
	 */
	 public static function decrypt($payload){
		return static::$root->decrypt($payload);
	 }

	/**
	 * Set the encryption key.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function setKey($key){
		 static::$root->setKey($key);
	 }

	/**
	 * Set the encryption cipher.
	 *
	 * @static
	 * @param	string	$cipher
	 * @return void
	 */
	 public static function setCipher($cipher){
		 static::$root->setCipher($cipher);
	 }

	/**
	 * Set the encryption mode.
	 *
	 * @static
	 * @param	string	$mode
	 * @return void
	 */
	 public static function setMode($mode){
		 static::$root->setMode($mode);
	 }

 }
}

namespace  {
 class DB extends Illuminate\Support\Facades\DB{
	/**
	 * @var \Illuminate\Database\DatabaseManager $root
	 */
	 static private $root;

	/**
	 * Create a new database manager instance.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$app
	 * @param	\Illuminate\Database\Connectors\ConnectionFactory	$factory
	 * @return void
	 */
	 public static function __construct($app, $factory){
		 static::$root->__construct($app, $factory);
	 }

	/**
	 * Get a database connection instance.
	 *
	 * @static
	 * @param	string	$name
	 * @return \Illuminate\Database\Connection
	 */
	 public static function connection($name = null){
		return static::$root->connection($name);
	 }

	/**
	 * Reconnect to the given database.
	 *
	 * @static
	 * @param	string	$name
	 * @return \Illuminate\Database\Connection
	 */
	 public static function reconnect($name = null){
		return static::$root->reconnect($name);
	 }

	/**
	 * Get the default connection name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDefaultConnection(){
		return static::$root->getDefaultConnection();
	 }

	/**
	 * Set the default connection name.
	 *
	 * @static
	 * @param	string	$name
	 * @return void
	 */
	 public static function setDefaultConnection($name){
		 static::$root->setDefaultConnection($name);
	 }

	/**
	 * Register an extension connection resolver.
	 *
	 * @static
	 * @param	string	$name
	 * @param	callable	$resolver
	 * @return void
	 */
	 public static function extend($name, $resolver){
		 static::$root->extend($name, $resolver);
	 }

	/**
	 * Dynamically pass methods to the default connection.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

	/**
	 * @var \Illuminate\Database\Connection $root2
	 */
	 static private $root2;

	/**
	 * Set the query grammar to the default implementation.
	 *
	 * @static
	 * @return void
	 */
	 public static function useDefaultQueryGrammar(){
		 static::$root2->useDefaultQueryGrammar();
	 }

	/**
	 * Set the schema grammar to the default implementation.
	 *
	 * @static
	 * @return void
	 */
	 public static function useDefaultSchemaGrammar(){
		 static::$root2->useDefaultSchemaGrammar();
	 }

	/**
	 * Set the query post processor to the default implementation.
	 *
	 * @static
	 * @return void
	 */
	 public static function useDefaultPostProcessor(){
		 static::$root2->useDefaultPostProcessor();
	 }

	/**
	 * Get a schema builder instance for the connection.
	 *
	 * @static
	 * @return \Illuminate\Database\Schema\Builder
	 */
	 public static function getSchemaBuilder(){
		return static::$root2->getSchemaBuilder();
	 }

	/**
	 * Begin a fluent query against a database table.
	 *
	 * @static
	 * @param	string	$table
	 * @return \Illuminate\Database\Query\Builder
	 */
	 public static function table($table){
		return static::$root2->table($table);
	 }

	/**
	 * Get a new raw query expression.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return \Illuminate\Database\Query\Expression
	 */
	 public static function raw($value){
		return static::$root2->raw($value);
	 }

	/**
	 * Run a select statement and return a single result.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return mixed
	 */
	 public static function selectOne($query, $bindings = array()){
		return static::$root2->selectOne($query, $bindings);
	 }

	/**
	 * Run a select statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return array
	 */
	 public static function select($query, $bindings = array()){
		return static::$root2->select($query, $bindings);
	 }

	/**
	 * Run an insert statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return bool
	 */
	 public static function insert($query, $bindings = array()){
		return static::$root2->insert($query, $bindings);
	 }

	/**
	 * Run an update statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function update($query, $bindings = array()){
		return static::$root2->update($query, $bindings);
	 }

	/**
	 * Run a delete statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function delete($query, $bindings = array()){
		return static::$root2->delete($query, $bindings);
	 }

	/**
	 * Execute an SQL statement and return the boolean result.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return bool
	 */
	 public static function statement($query, $bindings = array()){
		return static::$root2->statement($query, $bindings);
	 }

	/**
	 * Run an SQL statement and get the number of rows affected.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function affectingStatement($query, $bindings = array()){
		return static::$root2->affectingStatement($query, $bindings);
	 }

	/**
	 * Run a raw, unprepared query against the PDO connection.
	 *
	 * @static
	 * @param	string	$query
	 * @return bool
	 */
	 public static function unprepared($query){
		return static::$root2->unprepared($query);
	 }

	/**
	 * Prepare the query bindings for execution.
	 *
	 * @static
	 * @param	array	$bindings
	 * @return array
	 */
	 public static function prepareBindings($bindings){
		return static::$root2->prepareBindings($bindings);
	 }

	/**
	 * Execute a Closure within a transaction.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function transaction($callback){
		return static::$root2->transaction($callback);
	 }

	/**
	 * Execute the given callback in "dry run" mode.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return array
	 */
	 public static function pretend($callback){
		return static::$root2->pretend($callback);
	 }

	/**
	 * Log a query in the connection's query log.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @param	$time
	 * @return void
	 */
	 public static function logQuery($query, $bindings, $time = null){
		 static::$root2->logQuery($query, $bindings, $time);
	 }

	/**
	 * Register a database query listener with the connection.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function listen($callback){
		 static::$root2->listen($callback);
	 }

	/**
	 * Get a Doctrine Schema Column instance.
	 *
	 * @static
	 * @param	string	$table
	 * @param	string	$column
	 * @return \Doctrine\DBAL\Schema\Column
	 */
	 public static function getDoctrineColumn($table, $column){
		return static::$root2->getDoctrineColumn($table, $column);
	 }

	/**
	 * Get the Doctrine DBAL schema manager for the connection.
	 *
	 * @static
	 * @return \Doctrine\DBAL\Schema\AbstractSchemaManager
	 */
	 public static function getDoctrineSchemaManager(){
		return static::$root2->getDoctrineSchemaManager();
	 }

	/**
	 * Get the Doctrine DBAL database connection instance.
	 *
	 * @static
	 * @return \Doctrine\DBAL\Connection
	 */
	 public static function getDoctrineConnection(){
		return static::$root2->getDoctrineConnection();
	 }

	/**
	 * Get the currently used PDO connection.
	 *
	 * @static
	 * @return PDO
	 */
	 public static function getPdo(){
		return static::$root2->getPdo();
	 }

	/**
	 * Get the database connection name.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getName(){
		return static::$root2->getName();
	 }

	/**
	 * Get an option from the configuration options.
	 *
	 * @static
	 * @param	string	$option
	 * @return mixed
	 */
	 public static function getConfig($option){
		return static::$root2->getConfig($option);
	 }

	/**
	 * Get the PDO driver name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDriverName(){
		return static::$root2->getDriverName();
	 }

	/**
	 * Get the query grammar used by the connection.
	 *
	 * @static
	 * @return \Illuminate\Database\Query\Grammars\Grammar
	 */
	 public static function getQueryGrammar(){
		return static::$root2->getQueryGrammar();
	 }

	/**
	 * Set the query grammar used by the connection.
	 *
	 * @static
	 * @param	\Illuminate\Database\Query\Grammars\Grammar
	 * @return void
	 */
	 public static function setQueryGrammar($grammar){
		 static::$root2->setQueryGrammar($grammar);
	 }

	/**
	 * Get the schema grammar used by the connection.
	 *
	 * @static
	 * @return \Illuminate\Database\Query\Grammars\Grammar
	 */
	 public static function getSchemaGrammar(){
		return static::$root2->getSchemaGrammar();
	 }

	/**
	 * Set the schema grammar used by the connection.
	 *
	 * @static
	 * @param	\Illuminate\Database\Schema\Grammars\Grammar
	 * @return void
	 */
	 public static function setSchemaGrammar($grammar){
		 static::$root2->setSchemaGrammar($grammar);
	 }

	/**
	 * Get the query post processor used by the connection.
	 *
	 * @static
	 * @return \Illuminate\Database\Query\Processors\Processor
	 */
	 public static function getPostProcessor(){
		return static::$root2->getPostProcessor();
	 }

	/**
	 * Set the query post processor used by the connection.
	 *
	 * @static
	 * @param	\Illuminate\Database\Query\Processors\Processor
	 * @return void
	 */
	 public static function setPostProcessor($processor){
		 static::$root2->setPostProcessor($processor);
	 }

	/**
	 * Get the event dispatcher used by the connection.
	 *
	 * @static
	 * @return \Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return static::$root2->getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance on the connection.
	 *
	 * @static
	 * @param	\Illuminate\Events\Dispatcher
	 * @return void
	 */
	 public static function setEventDispatcher($events){
		 static::$root2->setEventDispatcher($events);
	 }

	/**
	 * Get the paginator environment instance.
	 *
	 * @static
	 * @return \Illuminate\Pagination\Environment
	 */
	 public static function getPaginator(){
		return static::$root2->getPaginator();
	 }

	/**
	 * Set the pagination environment instance.
	 *
	 * @static
	 * @param	\Illuminate\Pagination\Environment|Closure	$paginator
	 * @return void
	 */
	 public static function setPaginator($paginator){
		 static::$root2->setPaginator($paginator);
	 }

	/**
	 * Determine if the connection in a "dry run".
	 *
	 * @static
	 * @return bool
	 */
	 public static function pretending(){
		return static::$root2->pretending();
	 }

	/**
	 * Get the default fetch mode for the connection.
	 *
	 * @static
	 * @return int
	 */
	 public static function getFetchMode(){
		return static::$root2->getFetchMode();
	 }

	/**
	 * Set the default fetch mode for the connection.
	 *
	 * @static
	 * @param	int	$fetchMode
	 * @return int
	 */
	 public static function setFetchMode($fetchMode){
		return static::$root2->setFetchMode($fetchMode);
	 }

	/**
	 * Get the connection query log.
	 *
	 * @static
	 * @return array
	 */
	 public static function getQueryLog(){
		return static::$root2->getQueryLog();
	 }

	/**
	 * Clear the query log.
	 *
	 * @static
	 * @return void
	 */
	 public static function flushQueryLog(){
		 static::$root2->flushQueryLog();
	 }

	/**
	 * Enable the query log on the connection.
	 *
	 * @static
	 * @return void
	 */
	 public static function enableQueryLog(){
		 static::$root2->enableQueryLog();
	 }

	/**
	 * Disable the query log on the connection.
	 *
	 * @static
	 * @return void
	 */
	 public static function disableQueryLog(){
		 static::$root2->disableQueryLog();
	 }

	/**
	 * Get the name of the connected database.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDatabaseName(){
		return static::$root2->getDatabaseName();
	 }

	/**
	 * Set the name of the connected database.
	 *
	 * @static
	 * @param	string	$database
	 * @return string
	 */
	 public static function setDatabaseName($database){
		return static::$root2->setDatabaseName($database);
	 }

	/**
	 * Get the table prefix for the connection.
	 *
	 * @static
	 * @return string
	 */
	 public static function getTablePrefix(){
		return static::$root2->getTablePrefix();
	 }

	/**
	 * Set the table prefix in use by the connection.
	 *
	 * @static
	 * @param	string	$prefix
	 * @return void
	 */
	 public static function setTablePrefix($prefix){
		 static::$root2->setTablePrefix($prefix);
	 }

	/**
	 * Set the table prefix and return the grammar.
	 *
	 * @static
	 * @param	\Illuminate\Database\Grammar	$grammar
	 * @return \Illuminate\Database\Grammar
	 */
	 public static function withTablePrefix($grammar){
		return static::$root2->withTablePrefix($grammar);
	 }

 }
}

namespace  {
 class Eloquent{
	/**
	 * @var \Illuminate\Database\Eloquent\Model $root
	 */
	 static private $root;

	/**
	 * Create a new Eloquent model instance.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return void
	 */
	 public static function __construct($attributes = array()){
		 static::$root->__construct($attributes);
	 }

	/**
	 * Fill the model with an array of attributes.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return static
	 */
	 public static function fill($attributes){
		return static::$root->fill($attributes);
	 }

	/**
	 * Create a new instance of the given model.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	bool	$exists
	 * @return static
	 */
	 public static function newInstance($attributes = array(), $exists = false){
		return static::$root->newInstance($attributes, $exists);
	 }

	/**
	 * Create a new model instance that is existing.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return static
	 */
	 public static function newFromBuilder($attributes = array()){
		return static::$root->newFromBuilder($attributes);
	 }

	/**
	 * Save a new model and return the instance.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return static
	 */
	 public static function create($attributes){
		return static::$root->create($attributes);
	 }

	/**
	 * Begin querying the model on a given connection.
	 *
	 * @static
	 * @param	string	$connection
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function on($connection){
		return static::$root->on($connection);
	 }

	/**
	 * Get all of the models from the database.
	 *
	 * @static
	 * @param	array	$columns
	 * @return array|Eloquent[]|static[]
	 */
	 public static function all($columns = array()){
		return static::$root->all($columns);
	 }

	/**
	 * Find a model by its primary key.
	 *
	 * @static
	 * @param	mixed	$id
	 * @param	array	$columns
	 * @return static
	 */
	 public static function find($id, $columns = array()){
		return static::$root->find($id, $columns);
	 }

	/**
	 * Find a model by its primary key or throw an exception.
	 *
	 * @static
	 * @param	mixed	$id
	 * @param	array	$columns
	 * @return static
	 */
	 public static function findOrFail($id, $columns = array()){
		return static::$root->findOrFail($id, $columns);
	 }

	/**
	 * Eager load relations on the model.
	 *
	 * @static
	 * @param	dynamic	string
	 * @return void
	 */
	 public static function load(){
		 static::$root->load();
	 }

	/**
	 * Being querying a model with eager loading.
	 *
	 * @static
	 * @param	array	$relations
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function with($relations){
		return static::$root->with($relations);
	 }

	/**
	 * Define a one-to-one relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	 public static function hasOne($related, $foreignKey = null){
		return static::$root->hasOne($related, $foreignKey);
	 }

	/**
	 * Define a polymorphic one-to-one relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return \Illuminate\Database\Eloquent\Relations\MorphOne
	 */
	 public static function morphOne($related, $name, $type = null, $id = null){
		return static::$root->morphOne($related, $name, $type, $id);
	 }

	/**
	 * Define an inverse one-to-one or many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	 public static function belongsTo($related, $foreignKey = null){
		return static::$root->belongsTo($related, $foreignKey);
	 }

	/**
	 * Define an polymorphic, inverse one-to-one or many relationship.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	 public static function morphTo($name = null, $type = null, $id = null){
		return static::$root->morphTo($name, $type, $id);
	 }

	/**
	 * Define a one-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	 public static function hasMany($related, $foreignKey = null){
		return static::$root->hasMany($related, $foreignKey);
	 }

	/**
	 * Define a polymorphic one-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	 public static function morphMany($related, $name, $type = null, $id = null){
		return static::$root->morphMany($related, $name, $type, $id);
	 }

	/**
	 * Define a many-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$table
	 * @param	string	$foreignKey
	 * @param	string	$otherKey
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	 public static function belongsToMany($related, $table = null, $foreignKey = null, $otherKey = null){
		return static::$root->belongsToMany($related, $table, $foreignKey, $otherKey);
	 }

	/**
	 * Get the joining table name for a many-to-many relation.
	 *
	 * @static
	 * @param	string	$related
	 * @return string
	 */
	 public static function joiningTable($related){
		return static::$root->joiningTable($related);
	 }

	/**
	 * Destroy the models for the given IDs.
	 *
	 * @static
	 * @param	array|int	$ids
	 * @return void
	 */
	 public static function destroy($ids){
		 static::$root->destroy($ids);
	 }

	/**
	 * Delete the model from the database.
	 *
	 * @static
	 * @return void
	 */
	 public static function delete(){
		 static::$root->delete();
	 }

	/**
	 * Force a hard delete on a soft deleted model.
	 *
	 * @static
	 * @return void
	 */
	 public static function forceDelete(){
		 static::$root->forceDelete();
	 }

	/**
	 * Restore a soft-deleted model instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function restore(){
		 static::$root->restore();
	 }

	/**
	 * Register a saving model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function saving($callback){
		 static::$root->saving($callback);
	 }

	/**
	 * Register a saved model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function saved($callback){
		 static::$root->saved($callback);
	 }

	/**
	 * Register an updating model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function updating($callback){
		 static::$root->updating($callback);
	 }

	/**
	 * Register an updated model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function updated($callback){
		 static::$root->updated($callback);
	 }

	/**
	 * Register a creating model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function creating($callback){
		 static::$root->creating($callback);
	 }

	/**
	 * Register a created model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function created($callback){
		 static::$root->created($callback);
	 }

	/**
	 * Register a deleting model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function deleting($callback){
		 static::$root->deleting($callback);
	 }

	/**
	 * Register a deleted model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function deleted($callback){
		 static::$root->deleted($callback);
	 }

	/**
	 * Update the model in the database.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return mixed
	 */
	 public static function update($attributes = array()){
		return static::$root->update($attributes);
	 }

	/**
	 * Save the model to the database.
	 *
	 * @static
	 * @param	array	$options
	 * @return bool
	 */
	 public static function save($options = array()){
		return static::$root->save($options);
	 }

	/**
	 * Touch the owning relations of the model.
	 *
	 * @static
	 * @return void
	 */
	 public static function touchOwners(){
		 static::$root->touchOwners();
	 }

	/**
	 * Determine if the model touches a given relation.
	 *
	 * @static
	 * @param	string	$relation
	 * @return bool
	 */
	 public static function touches($relation){
		return static::$root->touches($relation);
	 }

	/**
	 * Update the model's update timestamp.
	 *
	 * @static
	 * @return bool
	 */
	 public static function touch(){
		return static::$root->touch();
	 }

	/**
	 * Set the value of the "created at" attribute.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function setCreatedAt($value){
		 static::$root->setCreatedAt($value);
	 }

	/**
	 * Set the value of the "updated at" attribute.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function setUpdatedAt($value){
		 static::$root->setUpdatedAt($value);
	 }

	/**
	 * Get the name of the "created at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getCreatedAtColumn(){
		return static::$root->getCreatedAtColumn();
	 }

	/**
	 * Get the name of the "updated at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getUpdatedAtColumn(){
		return static::$root->getUpdatedAtColumn();
	 }

	/**
	 * Get the name of the "deleted at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDeletedAtColumn(){
		return static::$root->getDeletedAtColumn();
	 }

	/**
	 * Get the fully qualified "deleted at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getQualifiedDeletedAtColumn(){
		return static::$root->getQualifiedDeletedAtColumn();
	 }

	/**
	 * Get a fresh timestamp for the model.
	 *
	 * @static
	 * @return mixed
	 */
	 public  function freshTimestamp(){
		return static::$root->freshTimestamp();
	 }

	/**
	 * Get a new query builder for the model's table.
	 *
	 * @static
	 * @param	bool	$excludeDeleted
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function newQuery($excludeDeleted = true){
		return static::$root->newQuery($excludeDeleted);
	 }

	/**
	 * Get a new query builder that includes soft deletes.
	 *
	 * @static
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function newQueryWithDeleted(){
		return static::$root->newQueryWithDeleted();
	 }

	/**
	 * Get a new query builder that includes soft deletes.
	 *
	 * @static
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function withTrashed(){
		return static::$root->withTrashed();
	 }

	/**
	 * Get a new query builder that only includes soft deletes.
	 *
	 * @static
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	 public static function trashed(){
		return static::$root->trashed();
	 }

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @static
	 * @param	array	$models
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	 public  function newCollection($models = array()){
		return static::$root->newCollection($models);
	 }

	/**
	 * Get the table associated with the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getTable(){
		return static::$root->getTable();
	 }

	/**
	 * Set the table associated with the model.
	 *
	 * @static
	 * @param	string	$table
	 * @return void
	 */
	 public static function setTable($table){
		 static::$root->setTable($table);
	 }

	/**
	 * Get the value of the model's primary key.
	 *
	 * @static
	 * @return mixed
	 */
	 public static function getKey(){
		return static::$root->getKey();
	 }

	/**
	 * Get the primary key for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getKeyName(){
		return static::$root->getKeyName();
	 }

	/**
	 * Get the table qualified key name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getQualifiedKeyName(){
		return static::$root->getQualifiedKeyName();
	 }

	/**
	 * Determine if the model uses timestamps.
	 *
	 * @static
	 * @return bool
	 */
	 public static function usesTimestamps(){
		return static::$root->usesTimestamps();
	 }

	/**
	 * Determine if the model instance uses soft deletes.
	 *
	 * @static
	 * @return bool
	 */
	 public static function isSoftDeleting(){
		return static::$root->isSoftDeleting();
	 }

	/**
	 * Set the soft deleting property on the model.
	 *
	 * @static
	 * @param	bool	$enabled
	 * @return void
	 */
	 public static function setSoftDeleting($enabled){
		 static::$root->setSoftDeleting($enabled);
	 }

	/**
	 * Get the number of models to return per page.
	 *
	 * @static
	 * @return int
	 */
	 public static function getPerPage(){
		return static::$root->getPerPage();
	 }

	/**
	 * Set the number of models ot return per page.
	 *
	 * @static
	 * @param	int	$perPage
	 * @return void
	 */
	 public static function setPerPage($perPage){
		 static::$root->setPerPage($perPage);
	 }

	/**
	 * Get the default foreign key name for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getForeignKey(){
		return static::$root->getForeignKey();
	 }

	/**
	 * Get the hidden attributes for the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getHidden(){
		return static::$root->getHidden();
	 }

	/**
	 * Set the hidden attributes for the model.
	 *
	 * @static
	 * @param	array	$hidden
	 * @return void
	 */
	 public static function setHidden($hidden){
		 static::$root->setHidden($hidden);
	 }

	/**
	 * Set the visible attributes for the model.
	 *
	 * @static
	 * @param	array	$visible
	 * @return void
	 */
	 public static function setVisible($visible){
		 static::$root->setVisible($visible);
	 }

	/**
	 * Get the fillable attributes for the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getFillable(){
		return static::$root->getFillable();
	 }

	/**
	 * Set the fillable attributes for the model.
	 *
	 * @static
	 * @param	array	$fillable
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	 public static function fillable($fillable){
		return static::$root->fillable($fillable);
	 }

	/**
	 * Set the guarded attributes for the model.
	 *
	 * @static
	 * @param	array	$guarded
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	 public static function guard($guarded){
		return static::$root->guard($guarded);
	 }

	/**
	 * Disable all mass assignable restrictions.
	 *
	 * @static
	 * @return void
	 */
	 public static function unguard(){
		 static::$root->unguard();
	 }

	/**
	 * Enable the mass assignment restrictions.
	 *
	 * @static
	 * @return void
	 */
	 public static function reguard(){
		 static::$root->reguard();
	 }

	/**
	 * Set "unguard" to a given state.
	 *
	 * @static
	 * @param	bool	$state
	 * @return void
	 */
	 public static function setUnguardState($state){
		 static::$root->setUnguardState($state);
	 }

	/**
	 * Determine if the given attribute may be mass assigned.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function isFillable($key){
		return static::$root->isFillable($key);
	 }

	/**
	 * Determine if the given key is guarded.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function isGuarded($key){
		return static::$root->isGuarded($key);
	 }

	/**
	 * Determine if the model is totally guarded.
	 *
	 * @static
	 * @return bool
	 */
	 public static function totallyGuarded(){
		return static::$root->totallyGuarded();
	 }

	/**
	 * Get the relationships that are touched on save.
	 *
	 * @static
	 * @return array
	 */
	 public static function getTouchedRelations(){
		return static::$root->getTouchedRelations();
	 }

	/**
	 * Set the relationships that are touched on save.
	 *
	 * @static
	 * @param	array	$touches
	 * @return void
	 */
	 public static function setTouchedRelations($touches){
		 static::$root->setTouchedRelations($touches);
	 }

	/**
	 * Get the value indicating whether the IDs are incrementing.
	 *
	 * @static
	 * @return bool
	 */
	 public static function getIncrementing(){
		return static::$root->getIncrementing();
	 }

	/**
	 * Set whether IDs are incrementing.
	 *
	 * @static
	 * @param	bool	$value
	 * @return void
	 */
	 public static function setIncrementing($value){
		 static::$root->setIncrementing($value);
	 }

	/**
	 * Convert the model instance to JSON.
	 *
	 * @static
	 * @param	int	$options
	 * @return string
	 */
	 public  function toJson($options = 0){
		return static::$root->toJson($options);
	 }

	/**
	 * Convert the model instance to an array.
	 *
	 * @static
	 * @return array
	 */
	 public  function toArray(){
		return static::$root->toArray();
	 }

	/**
	 * Convert the model's attributes to an array.
	 *
	 * @static
	 * @return array
	 */
	 public static function attributesToArray(){
		return static::$root->attributesToArray();
	 }

	/**
	 * Get the model's relationships in array form.
	 *
	 * @static
	 * @return array
	 */
	 public static function relationsToArray(){
		return static::$root->relationsToArray();
	 }

	/**
	 * Get an attribute from the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function getAttribute($key){
		return static::$root->getAttribute($key);
	 }

	/**
	 * Determine if a get mutator exists for an attribute.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasGetMutator($key){
		return static::$root->hasGetMutator($key);
	 }

	/**
	 * Set a given attribute on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function setAttribute($key, $value){
		 static::$root->setAttribute($key, $value);
	 }

	/**
	 * Determine if a set mutator exists for an attribute.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasSetMutator($key){
		return static::$root->hasSetMutator($key);
	 }

	/**
	 * Clone the model into a new, non-existing instance.
	 *
	 * @static
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	 public static function replicate(){
		return static::$root->replicate();
	 }

	/**
	 * Get all of the current attributes on the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return static::$root->getAttributes();
	 }

	/**
	 * Set the array of model attributes. No checking is done.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	bool	$sync
	 * @return void
	 */
	 public static function setRawAttributes($attributes, $sync = false){
		 static::$root->setRawAttributes($attributes, $sync);
	 }

	/**
	 * Get the model's original attribute values.
	 *
	 * @static
	 * @param	string|null	$key
	 * @param	mixed	$default
	 * @return array
	 */
	 public static function getOriginal($key = null, $default = null){
		return static::$root->getOriginal($key, $default);
	 }

	/**
	 * Sync the original attributes with the current.
	 *
	 * @static
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	 public static function syncOriginal(){
		return static::$root->syncOriginal();
	 }

	/**
	 * Determine if a given attribute is dirty.
	 *
	 * @static
	 * @param	string	$attribute
	 * @return bool
	 */
	 public static function isDirty($attribute){
		return static::$root->isDirty($attribute);
	 }

	/**
	 * Get the attributes that have been changed since last sync.
	 *
	 * @static
	 * @return array
	 */
	 public static function getDirty(){
		return static::$root->getDirty();
	 }

	/**
	 * Get a specified relationship.
	 *
	 * @static
	 * @param	string	$relation
	 * @return mixed
	 */
	 public static function getRelation($relation){
		return static::$root->getRelation($relation);
	 }

	/**
	 * Set the specific relationship in the model.
	 *
	 * @static
	 * @param	string	$relation
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function setRelation($relation, $value){
		 static::$root->setRelation($relation, $value);
	 }

	/**
	 * Set the entire relations array on the model.
	 *
	 * @static
	 * @param	array	$relations
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	 public static function setRelations($relations){
		return static::$root->setRelations($relations);
	 }

	/**
	 * Get the database connection for the model.
	 *
	 * @static
	 * @return \Illuminate\Database\Connection
	 */
	 public static function getConnection(){
		return static::$root->getConnection();
	 }

	/**
	 * Get the current connection name for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getConnectionName(){
		return static::$root->getConnectionName();
	 }

	/**
	 * Set the connection associated with the model.
	 *
	 * @static
	 * @param	string	$name
	 * @return void
	 */
	 public static function setConnection($name){
		 static::$root->setConnection($name);
	 }

	/**
	 * Resolve a connection instance by name.
	 *
	 * @static
	 * @param	string	$connection
	 * @return \Illuminate\Database\Connection
	 */
	 public static function resolveConnection($connection){
		return static::$root->resolveConnection($connection);
	 }

	/**
	 * Get the connection resolver instance.
	 *
	 * @static
	 * @return \Illuminate\Database\ConnectionResolverInterface
	 */
	 public static function getConnectionResolver(){
		return static::$root->getConnectionResolver();
	 }

	/**
	 * Set the connection resolver instance.
	 *
	 * @static
	 * @param	\Illuminate\Database\ConnectionResolverInterface	$resolver
	 * @return void
	 */
	 public static function setConnectionResolver($resolver){
		 static::$root->setConnectionResolver($resolver);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return \Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return static::$root->getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	\Illuminate\Events\Dispatcher
	 * @return void
	 */
	 public static function setEventDispatcher($dispatcher){
		 static::$root->setEventDispatcher($dispatcher);
	 }

	/**
	 * Unset the event dispatcher for models.
	 *
	 * @static
	 * @return void
	 */
	 public static function unsetEventDispatcher(){
		 static::$root->unsetEventDispatcher();
	 }

	/**
	 * Get the mutated attributes for a given instance.
	 *
	 * @static
	 * @return array
	 */
	 public static function getMutatedAttributes(){
		return static::$root->getMutatedAttributes();
	 }

	/**
	 * Dynamically retrieve attributes on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function __get($key){
		return static::$root->__get($key);
	 }

	/**
	 * Dynamically set attributes on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function __set($key, $value){
		 static::$root->__set($key, $value);
	 }

	/**
	 * Determine if the given attribute exists.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @return bool
	 */
	 public static function offsetExists($offset){
		return static::$root->offsetExists($offset);
	 }

	/**
	 * Get the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @return mixed
	 */
	 public static function offsetGet($offset){
		return static::$root->offsetGet($offset);
	 }

	/**
	 * Set the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function offsetSet($offset, $value){
		 static::$root->offsetSet($offset, $value);
	 }

	/**
	 * Unset the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @return void
	 */
	 public static function offsetUnset($offset){
		 static::$root->offsetUnset($offset);
	 }

	/**
	 * Determine if an attribute exists on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function __isset($key){
		 static::$root->__isset($key);
	 }

	/**
	 * Unset an attribute on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function __unset($key){
		 static::$root->__unset($key);
	 }

	/**
	 * Handle dynamic method calls into the method.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

	/**
	 * Handle dynamic static method calls into the method.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return static::$root->__callStatic($method, $parameters);
	 }

	/**
	 * Convert the model to its string representation.
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return static::$root->__toString();
	 }

	/**
	 * @var \Illuminate\Database\Query\Builder $root2
	 */
	 static private $root2;

	/**
	 * Set the columns to be selected.
	 *
	 * @static
	 * @param	array	$columns
	 * @return static
	 */
	 public static function select($columns = array()){
		return static::$root2->select($columns);
	 }

	/**
	 * Add a new select column to the query.
	 *
	 * @static
	 * @param	mixed	$column
	 * @return static
	 */
	 public static function addSelect($column){
		return static::$root2->addSelect($column);
	 }

	/**
	 * Force the query to only return distinct results.
	 *
	 * @static
	 * @return static
	 */
	 public static function distinct(){
		return static::$root2->distinct();
	 }

	/**
	 * Set the table which the query is targeting.
	 *
	 * @static
	 * @param	string	$table
	 * @return static
	 */
	 public static function from($table){
		return static::$root2->from($table);
	 }

	/**
	 * Add a join clause to the query.
	 *
	 * @static
	 * @param	string	$table
	 * @param	string	$first
	 * @param	string	$operator
	 * @param	string	$second
	 * @param	string	$type
	 * @return static
	 */
	 public static function join($table, $first, $operator = null, $second = null, $type = 'inner'){
		return static::$root2->join($table, $first, $operator, $second, $type);
	 }

	/**
	 * Add a left join to the query.
	 *
	 * @static
	 * @param	string	$table
	 * @param	string	$first
	 * @param	string	$operator
	 * @param	string	$second
	 * @return static
	 */
	 public static function leftJoin($table, $first, $operator = null, $second = null){
		return static::$root2->leftJoin($table, $first, $operator, $second);
	 }

	/**
	 * Add a basic where clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$operator
	 * @param	mixed	$value
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function where($column, $operator = null, $value = null, $boolean = 'and'){
		return static::$root2->where($column, $operator, $value, $boolean);
	 }

	/**
	 * Add an "or where" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$operator
	 * @param	mixed	$value
	 * @return static
	 */
	 public static function orWhere($column, $operator = null, $value = null){
		return static::$root2->orWhere($column, $operator, $value);
	 }

	/**
	 * Add a raw where clause to the query.
	 *
	 * @static
	 * @param	string	$sql
	 * @param	array	$bindings
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereRaw($sql, $bindings = array(), $boolean = 'and'){
		return static::$root2->whereRaw($sql, $bindings, $boolean);
	 }

	/**
	 * Add a raw or where clause to the query.
	 *
	 * @static
	 * @param	string	$sql
	 * @param	array	$bindings
	 * @return static
	 */
	 public static function orWhereRaw($sql, $bindings = array()){
		return static::$root2->orWhereRaw($sql, $bindings);
	 }

	/**
	 * Add a where between statement to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	array	$values
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereBetween($column, $values, $boolean = 'and'){
		return static::$root2->whereBetween($column, $values, $boolean);
	 }

	/**
	 * Add an or where between statement to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	array	$values
	 * @return static
	 */
	 public static function orWhereBetween($column, $values){
		return static::$root2->orWhereBetween($column, $values);
	 }

	/**
	 * Add a nested where statement to the query.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereNested($callback, $boolean = 'and'){
		return static::$root2->whereNested($callback, $boolean);
	 }

	/**
	 * Add an exists clause to the query.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @param	string	$boolean
	 * @param	bool	$not
	 * @return static
	 */
	 public static function whereExists($callback, $boolean = 'and', $not = false){
		return static::$root2->whereExists($callback, $boolean, $not);
	 }

	/**
	 * Add an or exists clause to the query.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @param	bool	$not
	 * @return static
	 */
	 public static function orWhereExists($callback, $not = false){
		return static::$root2->orWhereExists($callback, $not);
	 }

	/**
	 * Add a where not exists clause to the query.
	 *
	 * @static
	 * @param	Closure	$calback
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereNotExists($callback, $boolean = 'and'){
		return static::$root2->whereNotExists($callback, $boolean);
	 }

	/**
	 * Add a where not exists clause to the query.
	 *
	 * @static
	 * @param	Closure	$calback
	 * @return static
	 */
	 public static function orWhereNotExists($callback){
		return static::$root2->orWhereNotExists($callback);
	 }

	/**
	 * Add a "where in" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	mixed	$values
	 * @param	string	$boolean
	 * @param	bool	$not
	 * @return static
	 */
	 public static function whereIn($column, $values, $boolean = 'and', $not = false){
		return static::$root2->whereIn($column, $values, $boolean, $not);
	 }

	/**
	 * Add an "or where in" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	mixed	$values
	 * @return static
	 */
	 public static function orWhereIn($column, $values){
		return static::$root2->orWhereIn($column, $values);
	 }

	/**
	 * Add a "where not in" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	mixed	$values
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereNotIn($column, $values, $boolean = 'and'){
		return static::$root2->whereNotIn($column, $values, $boolean);
	 }

	/**
	 * Add an "or where not in" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	mixed	$values
	 * @return static
	 */
	 public static function orWhereNotIn($column, $values){
		return static::$root2->orWhereNotIn($column, $values);
	 }

	/**
	 * Add a "where null" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$boolean
	 * @param	bool	$not
	 * @return static
	 */
	 public static function whereNull($column, $boolean = 'and', $not = false){
		return static::$root2->whereNull($column, $boolean, $not);
	 }

	/**
	 * Add an "or where null" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @return static
	 */
	 public static function orWhereNull($column){
		return static::$root2->orWhereNull($column);
	 }

	/**
	 * Add a "where not null" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function whereNotNull($column, $boolean = 'and'){
		return static::$root2->whereNotNull($column, $boolean);
	 }

	/**
	 * Add an "or where not null" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @return static
	 */
	 public static function orWhereNotNull($column){
		return static::$root2->orWhereNotNull($column);
	 }

	/**
	 * Handles dynamic "where" clauses to the query.
	 *
	 * @static
	 * @param	string	$method
	 * @param	string	$parameters
	 * @return static
	 */
	 public static function dynamicWhere($method, $parameters){
		return static::$root2->dynamicWhere($method, $parameters);
	 }

	/**
	 * Add a "group by" clause to the query.
	 *
	 * @static
	 * @param	dynamic	$columns
	 * @return static
	 */
	 public static function groupBy(){
		return static::$root2->groupBy();
	 }

	/**
	 * Add a "having" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$operator
	 * @param	string	$value
	 * @return static
	 */
	 public static function having($column, $operator = null, $value = null){
		return static::$root2->having($column, $operator, $value);
	 }

	/**
	 * Add a raw having clause to the query.
	 *
	 * @static
	 * @param	string	$sql
	 * @param	array	$bindings
	 * @param	string	$boolean
	 * @return static
	 */
	 public static function havingRaw($sql, $bindings = array(), $boolean = 'and'){
		return static::$root2->havingRaw($sql, $bindings, $boolean);
	 }

	/**
	 * Add a raw or having clause to the query.
	 *
	 * @static
	 * @param	string	$sql
	 * @param	array	$bindings
	 * @return static
	 */
	 public static function orHavingRaw($sql, $bindings = array()){
		return static::$root2->orHavingRaw($sql, $bindings);
	 }

	/**
	 * Add an "order by" clause to the query.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$direction
	 * @return static
	 */
	 public static function orderBy($column, $direction = 'asc'){
		return static::$root2->orderBy($column, $direction);
	 }

	/**
	 * Set the "offset" value of the query.
	 *
	 * @static
	 * @param	int	$value
	 * @return static
	 */
	 public static function skip($value){
		return static::$root2->skip($value);
	 }

	/**
	 * Set the "limit" value of the query.
	 *
	 * @static
	 * @param	int	$value
	 * @return static
	 */
	 public static function take($value){
		return static::$root2->take($value);
	 }

	/**
	 * Set the limit and offset for a given page.
	 *
	 * @static
	 * @param	int	$page
	 * @param	int	$perPage
	 * @return static
	 */
	 public static function forPage($page, $perPage = 15){
		return static::$root2->forPage($page, $perPage);
	 }

	/**
	 * Add a union statement to the query.
	 *
	 * @static
	 * @param	\Illuminate\Database\Query\Builder|\Closure	$query
	 * @param	bool $all
	 * @return static
	 */
	 public static function union($query, $all = false){
		return static::$root2->union($query, $all);
	 }

	/**
	 * Add a union all statement to the query.
	 *
	 * @static
	 * @param	\Illuminate\Database\Query\Builder|\Closure	$query
	 * @return static
	 */
	 public static function unionAll($query){
		return static::$root2->unionAll($query);
	 }

	/**
	 * Get the SQL representation of the query.
	 *
	 * @static
	 * @return string
	 */
	 public  function toSql(){
		return static::$root2->toSql();
	 }

	/**
	 * Pluck a single column from the database.
	 *
	 * @static
	 * @param	string	$column
	 * @return static
	 */
	 public static function pluck($column){
		return static::$root2->pluck($column);
	 }

	/**
	 * Execute the query and get the first result.
	 *
	 * @static
	 * @param	array	$columns
	 * @return static
	 */
	 public static function first($columns = array()){
		return static::$root2->first($columns);
	 }

	/**
	 * Execute the query as a "select" statement.
	 *
	 * @static
	 * @param	array	$columns
	 * @return array|Eloquent[]|static[]
	 */
	 public static function get($columns = array()){
		return static::$root2->get($columns);
	 }

	/**
	 * Get an array with the values of a given column.
	 *
	 * @static
	 * @param	string	$column
	 * @param	string	$key
	 * @return array
	 */
	 public static function lists($column, $key = null){
		return static::$root2->lists($column, $key);
	 }

	/**
	 * Get a paginator for the "select" statement.
	 *
	 * @static
	 * @param	int	$perPage
	 * @param	array	$columns
	 * @return \Illuminate\Pagination\Paginator
	 */
	 public static function paginate($perPage = 15, $columns = array()){
		return static::$root2->paginate($perPage, $columns);
	 }

	/**
	 * Build a paginator instance from a raw result array.
	 *
	 * @static
	 * @param	\Illuminate\Pagination\Environment	$paginator
	 * @param	array	$results
	 * @param	int	$perPage
	 * @return \Illuminate\Pagination\Paginator
	 */
	 public static function buildRawPaginator($paginator, $results, $perPage){
		return static::$root2->buildRawPaginator($paginator, $results, $perPage);
	 }

	/**
	 * Get the count of the total records for pagination.
	 *
	 * @static
	 * @return int
	 */
	 public static function getPaginationCount(){
		return static::$root2->getPaginationCount();
	 }

	/**
	 * Determine if any rows exist for the current query.
	 *
	 * @static
	 * @return bool
	 */
	 public static function exists(){
		return static::$root2->exists();
	 }

	/**
	 * Retrieve the "count" result of the query.
	 *
	 * @static
	 * @param	string	$column
	 * @return int
	 */
	 public static function count($column = '*'){
		return static::$root2->count($column);
	 }

	/**
	 * Retrieve the minimum value of a given column.
	 *
	 * @static
	 * @param	string	$column
	 * @return mixed
	 */
	 public static function min($column){
		return static::$root2->min($column);
	 }

	/**
	 * Retrieve the maximum value of a given column.
	 *
	 * @static
	 * @param	string	$column
	 * @return mixed
	 */
	 public static function max($column){
		return static::$root2->max($column);
	 }

	/**
	 * Retrieve the sum of the values of a given column.
	 *
	 * @static
	 * @param	string	$column
	 * @return mixed
	 */
	 public static function sum($column){
		return static::$root2->sum($column);
	 }

	/**
	 * Retrieve the average of the values of a given column.
	 *
	 * @static
	 * @param	string	$column
	 * @return mixed
	 */
	 public static function avg($column){
		return static::$root2->avg($column);
	 }

	/**
	 * Execute an aggregate function on the database.
	 *
	 * @static
	 * @param	string	$function
	 * @param	array	$columns
	 * @return mixed
	 */
	 public static function aggregate($function, $columns = array()){
		return static::$root2->aggregate($function, $columns);
	 }

	/**
	 * Insert a new record into the database.
	 *
	 * @static
	 * @param	array	$values
	 * @return bool
	 */
	 public static function insert($values){
		return static::$root2->insert($values);
	 }

	/**
	 * Insert a new record and get the value of the primary key.
	 *
	 * @static
	 * @param	array	$values
	 * @param	string	$sequence
	 * @return int
	 */
	 public static function insertGetId($values, $sequence = null){
		return static::$root2->insertGetId($values, $sequence);
	 }

	/**
	 * Increment a column's value by a given amount.
	 *
	 * @static
	 * @param	string	$column
	 * @param	int	$amount
	 * @param	array	$extra
	 * @return int
	 */
	 public static function increment($column, $amount = 1, $extra = array()){
		return static::$root2->increment($column, $amount, $extra);
	 }

	/**
	 * Decrement a column's value by a given amount.
	 *
	 * @static
	 * @param	string	$column
	 * @param	int	$amount
	 * @param	array	$extra
	 * @return int
	 */
	 public static function decrement($column, $amount = 1, $extra = array()){
		return static::$root2->decrement($column, $amount, $extra);
	 }

	/**
	 * Run a truncate statement on the table.
	 *
	 * @static
	 * @return void
	 */
	 public static function truncate(){
		 static::$root2->truncate();
	 }

	/**
	 * Merge an array of where clauses and bindings.
	 *
	 * @static
	 * @param	array	$wheres
	 * @param	array	$bindings
	 * @return void
	 */
	 public static function mergeWheres($wheres, $bindings){
		 static::$root2->mergeWheres($wheres, $bindings);
	 }

	/**
	 * Get a copy of the where clauses and bindings in an array.
	 *
	 * @static
	 * @return array
	 */
	 public static function getAndResetWheres(){
		return static::$root2->getAndResetWheres();
	 }

	/**
	 * Create a raw database expression.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return \Illuminate\Database\Query\Expression
	 */
	 public static function raw($value){
		return static::$root2->raw($value);
	 }

	/**
	 * Get the current query value bindings.
	 *
	 * @static
	 * @return array
	 */
	 public static function getBindings(){
		return static::$root2->getBindings();
	 }

	/**
	 * Set the bindings on the query builder.
	 *
	 * @static
	 * @param	array	$bindings
	 * @return void
	 */
	 public static function setBindings($bindings){
		 static::$root2->setBindings($bindings);
	 }

	/**
	 * Merge an array of bindings into our bindings.
	 *
	 * @static
	 * @param	\Illuminate\Database\Query\Builder	$query
	 * @return static
	 */
	 public static function mergeBindings($query){
		return static::$root2->mergeBindings($query);
	 }

	/**
	 * Get the database query processor instance.
	 *
	 * @static
	 * @return \Illuminate\Database\Query\Processors\Processor
	 */
	 public static function getProcessor(){
		return static::$root2->getProcessor();
	 }

	/**
	 * Get the query grammar instance.
	 *
	 * @static
	 * @return \Illuminate\Database\Grammar
	 */
	 public static function getGrammar(){
		return static::$root2->getGrammar();
	 }

 }
}

namespace  {
 class Event extends Illuminate\Support\Facades\Event{
	/**
	 * @var \Illuminate\Events\Dispatcher $root
	 */
	 static private $root;

	/**
	 * Create a new event dispatcher instance.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function __construct($container = null){
		 static::$root->__construct($container);
	 }

	/**
	 * Register an event listener with the dispatcher.
	 *
	 * @static
	 * @param	string	$event
	 * @param	mixed	$listener
	 * @param	int	$priority
	 * @return void
	 */
	 public static function listen($event, $listener, $priority = 0){
		 static::$root->listen($event, $listener, $priority);
	 }

	/**
	 * Determine if a given event has listeners.
	 *
	 * @static
	 * @param	string	$eventName
	 * @return bool
	 */
	 public static function hasListeners($eventName){
		return static::$root->hasListeners($eventName);
	 }

	/**
	 * Register a queued event and payload.
	 *
	 * @static
	 * @param	string	$event
	 * @param	array	$payload
	 * @return void
	 */
	 public static function queue($event, $payload = array()){
		 static::$root->queue($event, $payload);
	 }

	/**
	 * Register an event subscriber with the dispatcher.
	 *
	 * @static
	 * @param	string	$subscriber
	 * @return void
	 */
	 public static function subscribe($subscriber){
		 static::$root->subscribe($subscriber);
	 }

	/**
	 * Fire an event until the first non-null response is returned.
	 *
	 * @static
	 * @param	string	$event
	 * @param	array	$payload
	 * @return mixed
	 */
	 public static function until($event, $payload = array()){
		return static::$root->until($event, $payload);
	 }

	/**
	 * Flush a set of queued events.
	 *
	 * @static
	 * @param	string	$event
	 * @return void
	 */
	 public static function flush($event){
		 static::$root->flush($event);
	 }

	/**
	 * Fire an event and call the listeners.
	 *
	 * @static
	 * @param	string	$event
	 * @param	mixed	$payload
	 * @param	boolean $halt
	 * @return void
	 */
	 public static function fire($event, $payload = array(), $halt = false){
		 static::$root->fire($event, $payload, $halt);
	 }

	/**
	 * Get all of the listeners for a given event name.
	 *
	 * @static
	 * @param	string	$eventName
	 * @return array
	 */
	 public static function getListeners($eventName){
		return static::$root->getListeners($eventName);
	 }

	/**
	 * Register an event listener with the dispatcher.
	 *
	 * @static
	 * @param	mixed	$listener
	 * @return void
	 */
	 public static function makeListener($listener){
		 static::$root->makeListener($listener);
	 }

	/**
	 * Create a class based listener using the IoC container.
	 *
	 * @static
	 * @param	mixed	$listener
	 * @return Closure
	 */
	 public static function createClassListener($listener){
		return static::$root->createClassListener($listener);
	 }

 }
}

namespace  {
 class File extends Illuminate\Support\Facades\File{
	/**
	 * @var \Illuminate\Filesystem\Filesystem $root
	 */
	 static private $root;

	/**
	 * Determine if a file exists.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function exists($path){
		return static::$root->exists($path);
	 }

	/**
	 * Get the contents of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function get($path){
		return static::$root->get($path);
	 }

	/**
	 * Get the contents of a remote file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function getRemote($path){
		return static::$root->getRemote($path);
	 }

	/**
	 * Get the returned value of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @return mixed
	 */
	 public static function getRequire($path){
		return static::$root->getRequire($path);
	 }

	/**
	 * Require the given file once.
	 *
	 * @static
	 * @param	string	$file
	 * @return void
	 */
	 public static function requireOnce($file){
		 static::$root->requireOnce($file);
	 }

	/**
	 * Write the contents of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$contents
	 * @return int
	 */
	 public static function put($path, $contents){
		return static::$root->put($path, $contents);
	 }

	/**
	 * Append to a file.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$data
	 * @return int
	 */
	 public static function append($path, $data){
		return static::$root->append($path, $data);
	 }

	/**
	 * Delete the file at a given path.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function delete($path){
		return static::$root->delete($path);
	 }

	/**
	 * Move a file to a new location.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$target
	 * @return void
	 */
	 public static function move($path, $target){
		 static::$root->move($path, $target);
	 }

	/**
	 * Copy a file to a new location.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$target
	 * @return void
	 */
	 public static function copy($path, $target){
		 static::$root->copy($path, $target);
	 }

	/**
	 * Extract the file extension from a file path.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function extension($path){
		return static::$root->extension($path);
	 }

	/**
	 * Get the file type of a given file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function type($path){
		return static::$root->type($path);
	 }

	/**
	 * Get the file size of a given file.
	 *
	 * @static
	 * @param	string	$path
	 * @return int
	 */
	 public static function size($path){
		return static::$root->size($path);
	 }

	/**
	 * Get the file's last modification time.
	 *
	 * @static
	 * @param	string	$path
	 * @return int
	 */
	 public static function lastModified($path){
		return static::$root->lastModified($path);
	 }

	/**
	 * Determine if the given path is a directory.
	 *
	 * @static
	 * @param	string	$directory
	 * @return bool
	 */
	 public static function isDirectory($directory){
		return static::$root->isDirectory($directory);
	 }

	/**
	 * Determine if the given path is writable.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function isWritable($path){
		return static::$root->isWritable($path);
	 }

	/**
	 * Determine if the given path is a file.
	 *
	 * @static
	 * @param	string	$file
	 * @return bool
	 */
	 public static function isFile($file){
		return static::$root->isFile($file);
	 }

	/**
	 * Find path names matching a given pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	int	$flags
	 * @return array
	 */
	 public static function glob($pattern, $flags = 0){
		return static::$root->glob($pattern, $flags);
	 }

	/**
	 * Get an array of all files in a directory.
	 *
	 * @static
	 * @param	string	$directory
	 * @return array
	 */
	 public static function files($directory){
		return static::$root->files($directory);
	 }

	/**
	 * Get all of the files from the given directory (recursive).
	 *
	 * @static
	 * @param	string	$directory
	 * @return array
	 */
	 public static function allFiles($directory){
		return static::$root->allFiles($directory);
	 }

	/**
	 * Get all of the directories within a given directory.
	 *
	 * @static
	 * @param	string	$directory
	 * @return array
	 */
	 public static function directories($directory){
		return static::$root->directories($directory);
	 }

	/**
	 * Create a directory.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$mode
	 * @param	bool	$recursive
	 * @return bool
	 */
	 public static function makeDirectory($path, $mode = 511, $recursive = false){
		return static::$root->makeDirectory($path, $mode, $recursive);
	 }

	/**
	 * Copy a directory from one location to another.
	 *
	 * @static
	 * @param	string	$directory
	 * @param	string	$destination
	 * @param	int	$options
	 * @return void
	 */
	 public static function copyDirectory($directory, $destination, $options = null){
		 static::$root->copyDirectory($directory, $destination, $options);
	 }

	/**
	 * Recursively delete a directory.
	 * The directory itself may be optionally preserved.
	 *
	 * @static
	 * @param	string	$directory
	 * @param	bool	$preserve
	 * @return void
	 */
	 public static function deleteDirectory($directory, $preserve = false){
		 static::$root->deleteDirectory($directory, $preserve);
	 }

	/**
	 * Empty the specified directory of all files and folders.
	 *
	 * @static
	 * @param	string	$directory
	 * @return void
	 */
	 public static function cleanDirectory($directory){
		 static::$root->cleanDirectory($directory);
	 }

 }
}

namespace  {
 class Form extends Illuminate\Support\Facades\Form{
	/**
	 * @var \Illuminate\Html\FormBuilder $root
	 */
	 static private $root;

	/**
	 * Create a new form builder instance.
	 *
	 * @static
	 * @param	\Illuminate\Routing\UrlGenerator	$url
	 * @param	\Illuminate\Html\HtmlBuilder	$html
	 * @param	string	$csrfToken
	 * @return void
	 */
	 public static function __construct($html, $url, $csrfToken){
		 static::$root->__construct($html, $url, $csrfToken);
	 }

	/**
	 * Open up a new HTML form.
	 *
	 * @static
	 * @param	array	$options
	 * @return string
	 */
	 public static function open($options = array()){
		return static::$root->open($options);
	 }

	/**
	 * Create a new model based form builder.
	 *
	 * @static
	 * @param	mixed	$model
	 * @param	array	$options
	 * @return string
	 */
	 public static function model($model, $options = array()){
		return static::$root->model($model, $options);
	 }

	/**
	 * Close the current form.
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return static::$root->close();
	 }

	/**
	 * Generate a hidden field with the current CSRF token.
	 *
	 * @static
	 * @return string
	 */
	 public static function token(){
		return static::$root->token();
	 }

	/**
	 * Create a form label element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function label($name, $value = null, $options = array()){
		return static::$root->label($name, $value, $options);
	 }

	/**
	 * Create a form input field.
	 *
	 * @static
	 * @param	string	$type
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function input($type, $name, $value = null, $options = array()){
		return static::$root->input($type, $name, $value, $options);
	 }

	/**
	 * Create a text input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function text($name, $value = null, $options = array()){
		return static::$root->text($name, $value, $options);
	 }

	/**
	 * Create a password input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$options
	 * @return string
	 */
	 public static function password($name, $options = array()){
		return static::$root->password($name, $options);
	 }

	/**
	 * Create a hidden input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function hidden($name, $value = null, $options = array()){
		return static::$root->hidden($name, $value, $options);
	 }

	/**
	 * Create an e-mail input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function email($name, $value = null, $options = array()){
		return static::$root->email($name, $value, $options);
	 }

	/**
	 * Create a file input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$options
	 * @return string
	 */
	 public static function file($name, $options = array()){
		return static::$root->file($name, $options);
	 }

	/**
	 * Create a textarea input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function textarea($name, $value = null, $options = array()){
		return static::$root->textarea($name, $value, $options);
	 }

	/**
	 * Create a select box field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$list
	 * @param	string	$selected
	 * @param	array	$options
	 * @return string
	 */
	 public static function select($name, $list = array(), $selected = null, $options = array()){
		return static::$root->select($name, $list, $selected, $options);
	 }

	/**
	 * Create a checkbox input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	mixed	$value
	 * @param	bool	$checked
	 * @param	array	$options
	 * @return string
	 */
	 public static function checkbox($name, $value = 1, $checked = null, $options = array()){
		return static::$root->checkbox($name, $value, $checked, $options);
	 }

	/**
	 * Create a radio button input field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	mixed	$value
	 * @param	bool	$checked
	 * @param	array	$options
	 * @return string
	 */
	 public static function radio($name, $value = null, $checked = null, $options = array()){
		return static::$root->radio($name, $value, $checked, $options);
	 }

	/**
	 * Create a HTML reset input element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function reset($value, $attributes = array()){
		return static::$root->reset($value, $attributes);
	 }

	/**
	 * Create a HTML image input element.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$name
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function image($url, $name = null, $attributes = array()){
		return static::$root->image($url, $name, $attributes);
	 }

	/**
	 * Create a submit button element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function submit($value = null, $options = array()){
		return static::$root->submit($value, $options);
	 }

	/**
	 * Create a button element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function button($value = null, $options = array()){
		return static::$root->button($value, $options);
	 }

	/**
	 * Register a custom form macro.
	 *
	 * @static
	 * @param	string	$name
	 * @param	callable	$macro
	 * @return void
	 */
	 public static function macro($name, $macro){
		 static::$root->macro($name, $macro);
	 }

	/**
	 * Get the value that should be assigned to the field.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @return string
	 */
	 public static function getValueAttribute($name, $value = null){
		return static::$root->getValueAttribute($name, $value);
	 }

	/**
	 * Get the session store implementation.
	 *
	 * @static
	 * @return \Illuminate\Session\Store
	 */
	 public static function getSessionStore(){
		return static::$root->getSessionStore();
	 }

	/**
	 * Set the session store implementation.
	 *
	 * @static
	 * @param	\Illuminate\Session\Store	$session
	 * @return \Illuminate\Html\FormBuilder
	 */
	 public static function setSessionStore($session){
		return static::$root->setSessionStore($session);
	 }

	/**
	 * Dynamically handle calls to the form builder.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

 }
}

namespace  {
 class Hash extends Illuminate\Support\Facades\Hash{
	/**
	 * @var \Illuminate\Hashing\BcryptHasher $root
	 */
	 static private $root;

	/**
	 * Create a new Bcrypt hasher instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function __construct(){
		 static::$root->__construct();
	 }

	/**
	 * Hash the given value.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function make($value, $options = array()){
		return static::$root->make($value, $options);
	 }

	/**
	 * Check the given plain value against a hash.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$hashedValue
	 * @param	array	$options
	 * @return bool
	 */
	 public static function check($value, $hashedValue, $options = array()){
		return static::$root->check($value, $hashedValue, $options);
	 }

	/**
	 * Check if the given hash has been hashed using the given options.
	 *
	 * @static
	 * @param	string	$hashedValue
	 * @param	array	$options
	 * @return bool
	 */
	 public static function needsRehash($hashedValue, $options = array()){
		return static::$root->needsRehash($hashedValue, $options);
	 }

 }
}

namespace  {
 class Html extends Illuminate\Support\Facades\HTML{
	/**
	 * @var \Illuminate\Html\HtmlBuilder $root
	 */
	 static private $root;

	/**
	 * Create a new HTML builder instance.
	 *
	 * @static
	 * @param	\Illuminate\Routing\UrlGenerator	$url
	 * @return void
	 */
	 public static function __construct($url = null){
		 static::$root->__construct($url);
	 }

	/**
	 * Register a custom HTML macro.
	 *
	 * @static
	 * @param	string	$name
	 * @param	callable	$macro
	 * @return void
	 */
	 public static function macro($name, $macro){
		 static::$root->macro($name, $macro);
	 }

	/**
	 * Convert an HTML string to entities.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function entities($value){
		return static::$root->entities($value);
	 }

	/**
	 * Convert entities to HTML characters.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function decode($value){
		return static::$root->decode($value);
	 }

	/**
	 * Generate a link to a JavaScript file.
	 *
	 * @static
	 * @param	string	$url
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function script($url, $attributes = array()){
		return static::$root->script($url, $attributes);
	 }

	/**
	 * Generate a link to a CSS file.
	 *
	 * @static
	 * @param	string	$url
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function style($url, $attributes = array()){
		return static::$root->style($url, $attributes);
	 }

	/**
	 * Generate an HTML image element.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$alt
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function image($url, $alt = null, $attributes = array()){
		return static::$root->image($url, $alt, $attributes);
	 }

	/**
	 * Generate a HTML link.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$title
	 * @param	array	$attributes
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function link($url, $title = null, $attributes = array(), $secure = null){
		return static::$root->link($url, $title, $attributes, $secure);
	 }

	/**
	 * Generate a HTTPS HTML link.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$title
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function secureLink($url, $title = null, $attributes = array()){
		return static::$root->secureLink($url, $title, $attributes);
	 }

	/**
	 * Generate a HTML link to an asset.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$title
	 * @param	array	$attributes
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function linkAsset($url, $title = null, $attributes = array(), $secure = null){
		return static::$root->linkAsset($url, $title, $attributes, $secure);
	 }

	/**
	 * Generate a HTTPS HTML link to an asset.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$title
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function linkSecureAsset($url, $title = null, $attributes = array()){
		return static::$root->linkSecureAsset($url, $title, $attributes);
	 }

	/**
	 * Generate a HTML link to a named route.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$title
	 * @param	array	$parameters
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function linkRoute($name, $title = null, $parameters = array(), $attributes = array()){
		return static::$root->linkRoute($name, $title, $parameters, $attributes);
	 }

	/**
	 * Generate a HTML link to a controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @param	string	$title
	 * @param	array	$parameters
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function linkAction($action, $title = null, $parameters = array(), $attributes = array()){
		return static::$root->linkAction($action, $title, $parameters, $attributes);
	 }

	/**
	 * Generate a HTML link to an email address.
	 *
	 * @static
	 * @param	string	$email
	 * @param	string	$title
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function mailto($email, $title = null, $attributes = array()){
		return static::$root->mailto($email, $title, $attributes);
	 }

	/**
	 * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
	 *
	 * @static
	 * @param	string	$email
	 * @return string
	 */
	 public static function email($email){
		return static::$root->email($email);
	 }

	/**
	 * Generate an ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ol($list, $attributes = array()){
		return static::$root->ol($list, $attributes);
	 }

	/**
	 * Generate an un-ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ul($list, $attributes = array()){
		return static::$root->ul($list, $attributes);
	 }

	/**
	 * Build an HTML attribute string from an array.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function attributes($attributes){
		return static::$root->attributes($attributes);
	 }

	/**
	 * Obfuscate a string to prevent spam-bots from sniffing it.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function obfuscate($value){
		return static::$root->obfuscate($value);
	 }

	/**
	 * Dynamically handle calls to the html class.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

 }
}

namespace  {
 class Input extends Illuminate\Support\Facades\Input{
	/**
	 * @var \Illuminate\Http\Request $root
	 */
	 static private $root;

	/**
	 * Return the Request instance.
	 *
	 * @static
	 * @return \Illuminate\Http\Request
	 */
	 public static function instance(){
		return static::$root->instance();
	 }

	/**
	 * Get the root URL for the application.
	 *
	 * @static
	 * @return string
	 */
	 public static function root(){
		return static::$root->root();
	 }

	/**
	 * Get the URL (no query string) for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function url(){
		return static::$root->url();
	 }

	/**
	 * Get the full URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function fullUrl(){
		return static::$root->fullUrl();
	 }

	/**
	 * Get the current path info for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function path(){
		return static::$root->path();
	 }

	/**
	 * Get a segment from the URI (1 based index).
	 *
	 * @static
	 * @param	string	$index
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function segment($index, $default = null){
		return static::$root->segment($index, $default);
	 }

	/**
	 * Get all of the segments for the request path.
	 *
	 * @static
	 * @return array
	 */
	 public static function segments(){
		return static::$root->segments();
	 }

	/**
	 * Determine if the current request URI matches a pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @return bool
	 */
	 public static function is($pattern){
		return static::$root->is($pattern);
	 }

	/**
	 * Determine if the request is the result of an AJAX call.
	 *
	 * @static
	 * @return bool
	 */
	 public static function ajax(){
		return static::$root->ajax();
	 }

	/**
	 * Determine if the request is over HTTPS.
	 *
	 * @static
	 * @return bool
	 */
	 public static function secure(){
		return static::$root->secure();
	 }

	/**
	 * Determine if the request contains a given input item.
	 *
	 * @static
	 * @param	string|array	$key
	 * @return bool
	 */
	 public static function has($key){
		return static::$root->has($key);
	 }

	/**
	 * Get all of the input and files for the request.
	 *
	 * @static
	 * @return array
	 */
	 public static function all(){
		return static::$root->all();
	 }

	/**
	 * Retrieve an input item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function input($key = null, $default = null){
		return static::$root->input($key, $default);
	 }

	/**
	 * Get a subset of the items from the input data.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function only($keys){
		return static::$root->only($keys);
	 }

	/**
	 * Get all of the input except for a specified array of items.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function except($keys){
		return static::$root->except($keys);
	 }

	/**
	 * Retrieve a query string item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function query($key = null, $default = null){
		return static::$root->query($key, $default);
	 }

	/**
	 * Retrieve a cookie from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function cookie($key = null, $default = null){
		return static::$root->cookie($key, $default);
	 }

	/**
	 * Retrieve a file from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return \Symfony\Component\HttpFoundation\File\UploadedFile
	 */
	 public static function file($key = null, $default = null){
		return static::$root->file($key, $default);
	 }

	/**
	 * Determine if the uploaded data contains a file.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasFile($key){
		return static::$root->hasFile($key);
	 }

	/**
	 * Retrieve a header from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function header($key = null, $default = null){
		return static::$root->header($key, $default);
	 }

	/**
	 * Retrieve a server variable from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function server($key = null, $default = null){
		return static::$root->server($key, $default);
	 }

	/**
	 * Retrieve an old input item.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function old($key = null, $default = null){
		return static::$root->old($key, $default);
	 }

	/**
	 * Flash the input for the current request to the session.
	 *
	 * @static
	 * @param	string $filter
	 * @param	array	$keys
	 * @return void
	 */
	 public static function flash($filter = null, $keys = array()){
		 static::$root->flash($filter, $keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 * @return void
	 */
	 public static function flashOnly($keys){
		 static::$root->flashOnly($keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 * @return void
	 */
	 public static function flashExcept($keys){
		 static::$root->flashExcept($keys);
	 }

	/**
	 * Flush all of the old input from the session.
	 *
	 * @static
	 * @return void
	 */
	 public static function flush(){
		 static::$root->flush();
	 }

	/**
	 * Merge new input into the current request's input array.
	 *
	 * @static
	 * @param	array	$input
	 * @return void
	 */
	 public static function merge($input){
		 static::$root->merge($input);
	 }

	/**
	 * Replace the input for the current request.
	 *
	 * @static
	 * @param	array	$input
	 * @return void
	 */
	 public static function replace($input){
		 static::$root->replace($input);
	 }

	/**
	 * Get the JSON payload for the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function json($key = null, $default = null){
		return static::$root->json($key, $default);
	 }

	/**
	 * Determine if the request is sending JSON.
	 *
	 * @static
	 * @return bool
	 */
	 public static function isJson(){
		return static::$root->isJson();
	 }

	/**
	 * Determine if the current request is asking for JSON in return.
	 *
	 * @static
	 * @return bool
	 */
	 public static function wantsJson(){
		return static::$root->wantsJson();
	 }

	/**
	 * Get the Illuminate session store implementation.
	 *
	 * @static
	 * @return \Illuminate\Session\Store
	 */
	 public static function getSessionStore(){
		return static::$root->getSessionStore();
	 }

	/**
	 * Set the Illuminate session store implementation.
	 *
	 * @static
	 * @param	\Illuminate\Session\Store	$session
	 * @return void
	 */
	 public static function setSessionStore($session){
		 static::$root->setSessionStore($session);
	 }

	/**
	 * Determine if the session store has been set.
	 *
	 * @static
	 * @return bool
	 */
	 public static function hasSessionStore(){
		return static::$root->hasSessionStore();
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data
	 * @return void
	 */
	 public static function __construct($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		 static::$root->__construct($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Sets the parameters for this request.
	 * This method also re-initializes all properties.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data
	 * @return void
	 */
	 public static function initialize($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		 static::$root->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Creates a new request with values from PHP's super globals.
	 *
	 * @static
	 * @return Request A new request
	 */
	 public static function createFromGlobals(){
		return static::$root->createFromGlobals();
	 }

	/**
	 * Creates a Request based on a given URI and configuration.
	 * The information contained in the URI always take precedence
	 * over the other information (server and parameters).
	 *
	 * @static
	 * @param	string $uri	The URI
	 * @param	string $method	The HTTP method
	 * @param	array	$parameters The query (GET) or request (POST) parameters
	 * @param	array	$cookies	The request cookies ($_COOKIE)
	 * @param	array	$files	The request files ($_FILES)
	 * @param	array	$server	The server parameters ($_SERVER)
	 * @param	string $content	The raw body data
	 * @return Request A Request instance
	 */
	 public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		return static::$root->create($uri, $method, $parameters, $cookies, $files, $server, $content);
	 }

	/**
	 * Clones a request and overrides some of its parameters.
	 *
	 * @static
	 * @param	array $query	The GET parameters
	 * @param	array $request	The POST parameters
	 * @param	array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array $cookies	The COOKIE parameters
	 * @param	array $files	The FILES parameters
	 * @param	array $server	The SERVER parameters
	 * @return Request The duplicated request
	 */
	 public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null){
		return static::$root->duplicate($query, $request, $attributes, $cookies, $files, $server);
	 }

	/**
	 * Returns the request as a string.
	 *
	 * @static
	 * @return string The request
	 */
	 public static function __toString(){
		return static::$root->__toString();
	 }

	/**
	 * Overrides the PHP global variables according to this request instance.
	 * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
	 * $_FILES is never override, see rfc1867
	 *
	 * @static
	 * @return void
	 */
	 public static function overrideGlobals(){
		 static::$root->overrideGlobals();
	 }

	/**
	 * Sets a list of trusted proxies.
	 * You should only list the reverse proxies that you manage directly.
	 *
	 * @static
	 * @param	array $proxies A list of trusted proxies
	 * @return void
	 */
	 public static function setTrustedProxies($proxies){
		 static::$root->setTrustedProxies($proxies);
	 }

	/**
	 * Gets the list of trusted proxies.
	 *
	 * @static
	 * @return array An array of trusted proxies.
	 */
	 public static function getTrustedProxies(){
		return static::$root->getTrustedProxies();
	 }

	/**
	 * Sets the name for trusted headers.
	 * The following header keys are supported:
	 * * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
	 * * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getClientHost())
	 * * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getClientPort())
	 * * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
	 * Setting an empty value allows to disable the trusted header for the given key.
	 *
	 * @static
	 * @param	string $key	The header key
	 * @param	string $value The header name
	 * @return void
	 */
	 public static function setTrustedHeaderName($key, $value){
		 static::$root->setTrustedHeaderName($key, $value);
	 }

	/**
	 * Gets the trusted proxy header name.
	 *
	 * @static
	 * @param	string $key The header key
	 * @return string The header name
	 */
	 public static function getTrustedHeaderName($key){
		return static::$root->getTrustedHeaderName($key);
	 }

	/**
	 * Normalizes a query string.
	 * It builds a normalized query string, where keys/value pairs are alphabetized,
	 * have consistent escaping and unneeded delimiters are removed.
	 *
	 * @static
	 * @param	string $qs Query string
	 * @return string A normalized query string for the Request
	 */
	 public static function normalizeQueryString($qs){
		return static::$root->normalizeQueryString($qs);
	 }

	/**
	 * Enables support for the _method request parameter to determine the intended HTTP method.
	 * Be warned that enabling this feature might lead to CSRF issues in your code.
	 * Check that you are using CSRF tokens when required.
	 * The HTTP method can only be overridden when the real HTTP method is POST.
	 *
	 * @static
	 * @return void
	 */
	 public static function enableHttpMethodParameterOverride(){
		 static::$root->enableHttpMethodParameterOverride();
	 }

	/**
	 * Checks whether support for the _method request parameter is enabled.
	 *
	 * @static
	 * @return Boolean True when the _method request parameter is enabled, false otherwise
	 */
	 public static function getHttpMethodParameterOverride(){
		return static::$root->getHttpMethodParameterOverride();
	 }

	/**
	 * Gets a "parameter" value.
	 * This method is mainly useful for libraries that want to provide some flexibility.
	 * Order of precedence: GET, PATH, POST
	 * Avoid using this method in controllers:
	 * * slow
	 * * prefer to get from a "named" source
	 * It is better to explicitly get request parameters from the appropriate
	 * public property instead (query, attributes, request).
	 *
	 * @static
	 * @param	string	$key	the key
	 * @param	mixed	$default the default value
	 * @param	Boolean $deep	is parameter deep in multidimensional array
	 * @return mixed
	 */
	 public static function get($key, $default = null, $deep = false){
		return static::$root->get($key, $default, $deep);
	 }

	/**
	 * Gets the Session.
	 *
	 * @static
	 * @return SessionInterface|null The session
	 */
	 public static function getSession(){
		return static::$root->getSession();
	 }

	/**
	 * Whether the request contains a Session which was started in one of the
	 * previous requests.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function hasPreviousSession(){
		return static::$root->hasPreviousSession();
	 }

	/**
	 * Whether the request contains a Session object.
	 * This method does not give any information about the state of the session object,
	 * like whether the session is started or not. It is just a way to check if this Request
	 * is associated with a Session instance.
	 *
	 * @static
	 * @return Boolean true when the Request contains a Session object, false otherwise
	 */
	 public static function hasSession(){
		return static::$root->hasSession();
	 }

	/**
	 * Sets the Session.
	 *
	 * @static
	 * @param	SessionInterface $session The Session
	 * @return void
	 */
	 public static function setSession($session){
		 static::$root->setSession($session);
	 }

	/**
	 * Returns the client IP addresses.
	 * The most trusted IP address is first, and the less trusted one last.
	 * The "real" client IP address is the last one, but this is also the
	 * less trusted one.
	 * Use this method carefully; you should use getClientIp() instead.
	 *
	 * @static
	 * @return array The client IP addresses
	 */
	 public static function getClientIps(){
		return static::$root->getClientIps();
	 }

	/**
	 * Returns the client IP address.
	 * This method can read the client IP address from the "X-Forwarded-For" header
	 * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
	 * header value is a comma+space separated list of IP addresses, the left-most
	 * being the original client, and each successive proxy that passed the request
	 * adding the IP address where it received the request from.
	 * If your reverse proxy uses a different header name than "X-Forwarded-For",
	 * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-ip" key.
	 *
	 * @static
	 * @return string The client IP address
	 */
	 public static function getClientIp(){
		return static::$root->getClientIp();
	 }

	/**
	 * Returns current script name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getScriptName(){
		return static::$root->getScriptName();
	 }

	/**
	 * Returns the path being requested relative to the executed script.
	 * The path info always starts with a /.
	 * Suppose this request is instantiated from /mysite on localhost:
	 * * http://localhost/mysite              returns an empty string
	 * * http://localhost/mysite/about        returns '/about'
	 * * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
	 * * http://localhost/mysite/about?var=1  returns '/about'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)
	 */
	 public static function getPathInfo(){
		return static::$root->getPathInfo();
	 }

	/**
	 * Returns the root path from which this request is executed.
	 * Suppose that an index.php file instantiates this request object:
	 * * http://localhost/index.php         returns an empty string
	 * * http://localhost/index.php/page    returns an empty string
	 * * http://localhost/web/index.php     returns '/web'
	 * * http://localhost/we%20b/index.php  returns '/we%20b'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)
	 */
	 public static function getBasePath(){
		return static::$root->getBasePath();
	 }

	/**
	 * Returns the root url from which this request is executed.
	 * The base URL never ends with a /.
	 * This is similar to getBasePath(), except that it also includes the
	 * script filename (e.g. index.php) if one exists.
	 *
	 * @static
	 * @return string The raw url (i.e. not urldecoded)
	 */
	 public static function getBaseUrl(){
		return static::$root->getBaseUrl();
	 }

	/**
	 * Gets the request's scheme.
	 *
	 * @static
	 * @return string
	 */
	 public static function getScheme(){
		return static::$root->getScheme();
	 }

	/**
	 * Returns the port on which the request is made.
	 * This method can read the client port from the "X-Forwarded-Port" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Port" header must contain the client port.
	 * If your reverse proxy uses a different header name than "X-Forwarded-Port",
	 * configure it via "setTrustedHeaderName()" with the "client-port" key.
	 *
	 * @static
	 * @return string
	 */
	 public static function getPort(){
		return static::$root->getPort();
	 }

	/**
	 * Returns the user.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getUser(){
		return static::$root->getUser();
	 }

	/**
	 * Returns the password.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getPassword(){
		return static::$root->getPassword();
	 }

	/**
	 * Gets the user info.
	 *
	 * @static
	 * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
	 */
	 public static function getUserInfo(){
		return static::$root->getUserInfo();
	 }

	/**
	 * Returns the HTTP host being requested.
	 * The port name will be appended to the host if it's non-standard.
	 *
	 * @static
	 * @return string
	 */
	 public static function getHttpHost(){
		return static::$root->getHttpHost();
	 }

	/**
	 * Returns the requested URI.
	 *
	 * @static
	 * @return string The raw URI (i.e. not urldecoded)
	 */
	 public static function getRequestUri(){
		return static::$root->getRequestUri();
	 }

	/**
	 * Gets the scheme and HTTP host.
	 * If the URL was called with basic authentication, the user
	 * and the password are not added to the generated string.
	 *
	 * @static
	 * @return string The scheme and HTTP host
	 */
	 public static function getSchemeAndHttpHost(){
		return static::$root->getSchemeAndHttpHost();
	 }

	/**
	 * Generates a normalized URI for the Request.
	 *
	 * @static
	 * @return string A normalized URI for the Request
	 */
	 public static function getUri(){
		return static::$root->getUri();
	 }

	/**
	 * Generates a normalized URI for the given path.
	 *
	 * @static
	 * @param	string $path A path to use instead of the current one
	 * @return string The normalized URI for the path
	 */
	 public static function getUriForPath($path){
		return static::$root->getUriForPath($path);
	 }

	/**
	 * Generates the normalized query string for the Request.
	 * It builds a normalized query string, where keys/value pairs are alphabetized
	 * and have consistent escaping.
	 *
	 * @static
	 * @return string|null A normalized query string for the Request
	 */
	 public static function getQueryString(){
		return static::$root->getQueryString();
	 }

	/**
	 * Checks whether the request is secure or not.
	 * This method can read the client port from the "X-Forwarded-Proto" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
	 * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
	 * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-proto" key.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isSecure(){
		return static::$root->isSecure();
	 }

	/**
	 * Returns the host name.
	 * This method can read the client port from the "X-Forwarded-Host" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Host" header must contain the client host name.
	 * If your reverse proxy uses a different header name than "X-Forwarded-Host",
	 * configure it via "setTrustedHeaderName()" with the "client-host" key.
	 *
	 * @static
	 * @return string
	 */
	 public static function getHost(){
		return static::$root->getHost();
	 }

	/**
	 * Sets the request method.
	 *
	 * @static
	 * @param	string $method
	 * @return void
	 */
	 public static function setMethod($method){
		 static::$root->setMethod($method);
	 }

	/**
	 * Gets the request "intended" method.
	 * If the X-HTTP-Method-Override header is set, and if the method is a POST,
	 * then it is used to determine the "real" intended HTTP method.
	 * The _method request parameter can also be used to determine the HTTP method,
	 * but only if enableHttpMethodParameterOverride() has been called.
	 * The method is always an uppercased string.
	 *
	 * @static
	 * @return string The request method
	 */
	 public static function getMethod(){
		return static::$root->getMethod();
	 }

	/**
	 * Gets the "real" request method.
	 *
	 * @static
	 * @return string The request method
	 */
	 public static function getRealMethod(){
		return static::$root->getRealMethod();
	 }

	/**
	 * Gets the mime type associated with the format.
	 *
	 * @static
	 * @param	string $format The format
	 * @return string The associated mime type (null if not found)
	 */
	 public static function getMimeType($format){
		return static::$root->getMimeType($format);
	 }

	/**
	 * Gets the format associated with the mime type.
	 *
	 * @static
	 * @param	string $mimeType The associated mime type
	 * @return string|null The format (null if not found)
	 */
	 public static function getFormat($mimeType){
		return static::$root->getFormat($mimeType);
	 }

	/**
	 * Associates a format with mime types.
	 *
	 * @static
	 * @param	string	$format	The format
	 * @param	string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
	 * @return void
	 */
	 public static function setFormat($format, $mimeTypes){
		 static::$root->setFormat($format, $mimeTypes);
	 }

	/**
	 * Gets the request format.
	 * Here is the process to determine the format:
	 * * format defined by the user (with setRequestFormat())
	 * * _format request parameter
	 * * $default
	 *
	 * @static
	 * @param	string $default The default format
	 * @return string The request format
	 */
	 public static function getRequestFormat($default = 'html'){
		return static::$root->getRequestFormat($default);
	 }

	/**
	 * Sets the request format.
	 *
	 * @static
	 * @param	string $format The request format.
	 * @return void
	 */
	 public static function setRequestFormat($format){
		 static::$root->setRequestFormat($format);
	 }

	/**
	 * Gets the format associated with the request.
	 *
	 * @static
	 * @return string|null The format (null if no content type is present)
	 */
	 public static function getContentType(){
		return static::$root->getContentType();
	 }

	/**
	 * Sets the default locale.
	 *
	 * @static
	 * @param	string $locale
	 * @return void
	 */
	 public static function setDefaultLocale($locale){
		 static::$root->setDefaultLocale($locale);
	 }

	/**
	 * Sets the locale.
	 *
	 * @static
	 * @param	string $locale
	 * @return void
	 */
	 public static function setLocale($locale){
		 static::$root->setLocale($locale);
	 }

	/**
	 * Get the locale.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return static::$root->getLocale();
	 }

	/**
	 * Checks if the request method is of specified type.
	 *
	 * @static
	 * @param	string $method Uppercase request method (GET, POST etc).
	 * @return Boolean
	 */
	 public static function isMethod($method){
		return static::$root->isMethod($method);
	 }

	/**
	 * Checks whether the method is safe or not.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isMethodSafe(){
		return static::$root->isMethodSafe();
	 }

	/**
	 * Returns the request body content.
	 *
	 * @static
	 * @param	Boolean $asResource If true, a resource will be returned
	 * @return string|resource The request body content or a resource to read the body stream.
	 */
	 public static function getContent($asResource = false){
		return static::$root->getContent($asResource);
	 }

	/**
	 * Gets the Etags.
	 *
	 * @static
	 * @return array The entity tags
	 */
	 public static function getETags(){
		return static::$root->getETags();
	 }

	/**
	 * 
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isNoCache(){
		return static::$root->isNoCache();
	 }

	/**
	 * Returns the preferred language.
	 *
	 * @static
	 * @param	array $locales An array of ordered available locales
	 * @return string|null The preferred locale
	 */
	 public static function getPreferredLanguage($locales = null){
		return static::$root->getPreferredLanguage($locales);
	 }

	/**
	 * Gets a list of languages acceptable by the client browser.
	 *
	 * @static
	 * @return array Languages ordered in the user browser preferences
	 */
	 public static function getLanguages(){
		return static::$root->getLanguages();
	 }

	/**
	 * Gets a list of charsets acceptable by the client browser.
	 *
	 * @static
	 * @return array List of charsets in preferable order
	 */
	 public static function getCharsets(){
		return static::$root->getCharsets();
	 }

	/**
	 * Gets a list of content types acceptable by the client browser
	 *
	 * @static
	 * @return array List of content types in preferable order
	 */
	 public static function getAcceptableContentTypes(){
		return static::$root->getAcceptableContentTypes();
	 }

	/**
	 * Returns true if the request is a XMLHttpRequest.
	 * It works if your JavaScript library set an X-Requested-With HTTP header.
	 * It is known to work with common JavaScript frameworks:
	 *
	 * @static
	 * @return Boolean true if the request is an XMLHttpRequest, false otherwise
	 */
	 public static function isXmlHttpRequest(){
		return static::$root->isXmlHttpRequest();
	 }

 }
}

namespace  {
 class Lang extends Illuminate\Support\Facades\Lang{
	/**
	 * @var \Illuminate\Translation\Translator $root
	 */
	 static private $root;

	/**
	 * Create a new translator instance.
	 *
	 * @static
	 * @param	\Illuminate\Translation\LoaderInterface	$loader
	 * @param	string	$locale
	 * @return void
	 */
	 public static function __construct($loader, $locale){
		 static::$root->__construct($loader, $locale);
	 }

	/**
	 * Determine if a translation exists.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$locale
	 * @return bool
	 */
	 public static function has($key, $locale = null){
		return static::$root->has($key, $locale);
	 }

	/**
	 * Get the translation for the given key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$replace
	 * @param	string	$locale
	 * @return string
	 */
	 public static function get($key, $replace = array(), $locale = null){
		return static::$root->get($key, $replace, $locale);
	 }

	/**
	 * Get a translation according to an integer value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	int	$number
	 * @param	array	$replace
	 * @param	string	$locale
	 * @return string
	 */
	 public static function choice($key, $number, $replace = array(), $locale = null){
		return static::$root->choice($key, $number, $replace, $locale);
	 }

	/**
	 * Get the translation for a given key.
	 *
	 * @static
	 * @param	string	$id
	 * @param	array	$parameters
	 * @param	string	$domain
	 * @param	string	$locale
	 * @return string
	 */
	 public static function trans($id, $parameters = array(), $domain = 'messages', $locale = null){
		return static::$root->trans($id, $parameters, $domain, $locale);
	 }

	/**
	 * Get a translation according to an integer value.
	 *
	 * @static
	 * @param	string	$id
	 * @param	int	$number
	 * @param	array	$parameters
	 * @param	string	$domain
	 * @param	string	$locale
	 * @return string
	 */
	 public static function transChoice($id, $number, $parameters = array(), $domain = 'messages', $locale = null){
		return static::$root->transChoice($id, $number, $parameters, $domain, $locale);
	 }

	/**
	 * Load the specified language group.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$group
	 * @param	string	$locale
	 * @return string
	 */
	 public static function load($namespace, $group, $locale){
		return static::$root->load($namespace, $group, $locale);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$hint
	 * @return void
	 */
	 public static function addNamespace($namespace, $hint){
		 static::$root->addNamespace($namespace, $hint);
	 }

	/**
	 * Parse a key into namespace, group, and item.
	 *
	 * @static
	 * @param	string	$key
	 * @return array
	 */
	 public static function parseKey($key){
		return static::$root->parseKey($key);
	 }

	/**
	 * Get the message selector instance.
	 *
	 * @static
	 * @return \Symfony\Component\Translation\MessageSelector
	 */
	 public static function getSelector(){
		return static::$root->getSelector();
	 }

	/**
	 * Set the message selector instance.
	 *
	 * @static
	 * @param	\Symfony\Component\Translation\MessageSelector	$selector
	 * @return void
	 */
	 public static function setSelector($selector){
		 static::$root->setSelector($selector);
	 }

	/**
	 * Get the language line loader implementation.
	 *
	 * @static
	 * @return \Illuminate\Translation\LoaderInterface
	 */
	 public static function getLoader(){
		return static::$root->getLoader();
	 }

	/**
	 * Get the default locale being used.
	 *
	 * @static
	 * @return string
	 */
	 public static function locale(){
		return static::$root->locale();
	 }

	/**
	 * Get the default locale being used.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return static::$root->getLocale();
	 }

	/**
	 * Set the default locale.
	 *
	 * @static
	 * @param	string	$locale
	 * @return void
	 */
	 public static function setLocale($locale){
		 static::$root->setLocale($locale);
	 }

	/**
	 * Set the parsed value of a key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$parsed
	 * @return void
	 */
	 public static function setParsedKey($key, $parsed){
		 static::$root->setParsedKey($key, $parsed);
	 }

 }
}

namespace  {
 class Log extends Illuminate\Support\Facades\Log{
	/**
	 * @var \Illuminate\Log\Writer $root
	 */
	 static private $root;

	/**
	 * Create a new log writer instance.
	 *
	 * @static
	 * @param	\Monolog\Logger	$monolog
	 * @param	\Illuminate\Events\Dispatcher	$dispatcher
	 * @return void
	 */
	 public static function __construct($monolog, $dispatcher = null){
		 static::$root->__construct($monolog, $dispatcher);
	 }

	/**
	 * Register a file log handler.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$level
	 * @return void
	 */
	 public static function useFiles($path, $level = 'debug'){
		 static::$root->useFiles($path, $level);
	 }

	/**
	 * Register a daily file log handler.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$days
	 * @param	string	$level
	 * @return void
	 */
	 public static function useDailyFiles($path, $days = 0, $level = 'debug'){
		 static::$root->useDailyFiles($path, $days, $level);
	 }

	/**
	 * Get the underlying Monolog instance.
	 *
	 * @static
	 * @return \Monolog\Logger
	 */
	 public static function getMonolog(){
		return static::$root->getMonolog();
	 }

	/**
	 * Register a new callback handler for when
	 * a log event is triggered.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function listen($callback){
		 static::$root->listen($callback);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return \Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return static::$root->getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	\Illuminate\Events\Dispatcher
	 * @return void
	 */
	 public static function setEventDispatcher($dispatcher){
		 static::$root->setEventDispatcher($dispatcher);
	 }

	/**
	 * Dynamically handle error additions.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

 }
}

namespace  {
 class Mail extends Illuminate\Support\Facades\Mail{
	/**
	 * @var \Illuminate\Mail\Mailer $root
	 */
	 static private $root;

	/**
	 * Create a new Mailer instance.
	 *
	 * @static
	 * @param	\Illuminate\View\Environment	$views
	 * @param	Swift_Mailer	$swift
	 * @return void
	 */
	 public static function __construct($views, $swift){
		 static::$root->__construct($views, $swift);
	 }

	/**
	 * Set the global from address and name.
	 *
	 * @static
	 * @param	string	$address
	 * @param	string	$name
	 * @return void
	 */
	 public static function alwaysFrom($address, $name = null){
		 static::$root->alwaysFrom($address, $name);
	 }

	/**
	 * Send a new message when only a plain part.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	mixed	$callback
	 * @return void
	 */
	 public static function plain($view, $data, $callback){
		 static::$root->plain($view, $data, $callback);
	 }

	/**
	 * Send a new message using a view.
	 *
	 * @static
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function send($view, $data, $callback){
		 static::$root->send($view, $data, $callback);
	 }

	/**
	 * Queue a new e-mail message for sending.
	 *
	 * @static
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 * @param	string	$queue
	 * @return void
	 */
	 public static function queue($view, $data, $callback, $queue = null){
		 static::$root->queue($view, $data, $callback, $queue);
	 }

	/**
	 * Queue a new e-mail message for sending on the given queue.
	 *
	 * @static
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 * @param	string	$queue
	 * @return void
	 */
	 public static function queueOn($queue, $view, $data, $callback){
		 static::$root->queueOn($queue, $view, $data, $callback);
	 }

	/**
	 * Queue a new e-mail message for sending after (n) seconds.
	 *
	 * @static
	 * @param	int	$delay
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 * @param	string	$queue
	 * @return void
	 */
	 public static function later($delay, $view, $data, $callback, $queue = null){
		 static::$root->later($delay, $view, $data, $callback, $queue);
	 }

	/**
	 * Queue a new e-mail message for sending after (n) seconds on the given queue.
	 *
	 * @static
	 * @param	string	$queue
	 * @param	int	$delay
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function laterOn($queue, $delay, $view, $data, $callback){
		 static::$root->laterOn($queue, $delay, $view, $data, $callback);
	 }

	/**
	 * Handle a queued e-mail message job.
	 *
	 * @static
	 * @param	\Illuminate\Queue\Jobs\Job	$job
	 * @param	array	$data
	 * @return void
	 */
	 public static function handleQueuedMessage($job, $data){
		 static::$root->handleQueuedMessage($job, $data);
	 }

	/**
	 * Tell the mailer to not really send messages.
	 *
	 * @static
	 * @param	bool	$value
	 * @return void
	 */
	 public static function pretend($value = true){
		 static::$root->pretend($value);
	 }

	/**
	 * Get the view environment instance.
	 *
	 * @static
	 * @return \Illuminate\View\Environment
	 */
	 public static function getViewEnvironment(){
		return static::$root->getViewEnvironment();
	 }

	/**
	 * Get the Swift Mailer instance.
	 *
	 * @static
	 * @return Swift_Mailer
	 */
	 public static function getSwiftMailer(){
		return static::$root->getSwiftMailer();
	 }

	/**
	 * Set the Swift Mailer instance.
	 *
	 * @static
	 * @param	Swift_Mailer	$swift
	 * @return void
	 */
	 public static function setSwiftMailer($swift){
		 static::$root->setSwiftMailer($swift);
	 }

	/**
	 * Set the log writer instance.
	 *
	 * @static
	 * @param	\Illuminate\Log\Writer	$logger
	 * @return \Illuminate\Mail\Mailer
	 */
	 public static function setLogger($logger){
		return static::$root->setLogger($logger);
	 }

	/**
	 * Set the queue manager instance.
	 *
	 * @static
	 * @param	\Illuminate\Queue\QueueManager	$queue
	 * @return \Illuminate\Mail\Mailer
	 */
	 public static function setQueue($queue){
		return static::$root->setQueue($queue);
	 }

	/**
	 * Set the IoC container instance.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function setContainer($container){
		 static::$root->setContainer($container);
	 }

 }
}

namespace  {
 class Paginator extends Illuminate\Support\Facades\Paginator{
	/**
	 * @var \Illuminate\Pagination\Environment $root
	 */
	 static private $root;

	/**
	 * Create a new pagination environment.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @param	\Illuminate\View\Environment	$view
	 * @param	\Symfony\Component\Translation\TranslatorInterface	$trans
	 * @param	string	$pageName
	 * @return void
	 */
	 public static function __construct($request, $view, $trans, $pageName = 'page'){
		 static::$root->__construct($request, $view, $trans, $pageName);
	 }

	/**
	 * Get a new paginator instance.
	 *
	 * @static
	 * @param	array	$items
	 * @param	int	$perPage
	 * @param	int	$total
	 * @return \Illuminate\Pagination\Paginator
	 */
	 public static function make($items, $total, $perPage){
		return static::$root->make($items, $total, $perPage);
	 }

	/**
	 * Get the pagination view.
	 *
	 * @static
	 * @param	\Illuminate\Pagination\Paginator	$paginator
	 * @return \Illuminate\View\View
	 */
	 public static function getPaginationView($paginator){
		return static::$root->getPaginationView($paginator);
	 }

	/**
	 * Get the number of the current page.
	 *
	 * @static
	 * @return int
	 */
	 public static function getCurrentPage(){
		return static::$root->getCurrentPage();
	 }

	/**
	 * Set the number of the current page.
	 *
	 * @static
	 * @param	int	$number
	 * @return void
	 */
	 public static function setCurrentPage($number){
		 static::$root->setCurrentPage($number);
	 }

	/**
	 * Get the root URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function getCurrentUrl(){
		return static::$root->getCurrentUrl();
	 }

	/**
	 * Set the base URL in use by the paginator.
	 *
	 * @static
	 * @param	string	$baseUrl
	 * @return void
	 */
	 public static function setBaseUrl($baseUrl){
		 static::$root->setBaseUrl($baseUrl);
	 }

	/**
	 * Set the input page parameter name used by the paginator.
	 *
	 * @static
	 * @param	string	$pageName
	 * @return void
	 */
	 public static function setPageName($pageName){
		 static::$root->setPageName($pageName);
	 }

	/**
	 * Get the input page parameter name used by the paginator.
	 *
	 * @static
	 * @return string
	 */
	 public static function getPageName(){
		return static::$root->getPageName();
	 }

	/**
	 * Get the name of the pagination view.
	 *
	 * @static
	 * @return string
	 */
	 public static function getViewName(){
		return static::$root->getViewName();
	 }

	/**
	 * Set the name of the pagination view.
	 *
	 * @static
	 * @param	string	$viewName
	 * @return void
	 */
	 public static function setViewName($viewName){
		 static::$root->setViewName($viewName);
	 }

	/**
	 * Get the locale of the paginator.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return static::$root->getLocale();
	 }

	/**
	 * Set the locale of the paginator.
	 *
	 * @static
	 * @param	string	$locale
	 * @return void
	 */
	 public static function setLocale($locale){
		 static::$root->setLocale($locale);
	 }

	/**
	 * Get the active request instance.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return static::$root->getRequest();
	 }

	/**
	 * Set the active request instance.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return void
	 */
	 public static function setRequest($request){
		 static::$root->setRequest($request);
	 }

	/**
	 * Get the current view driver.
	 *
	 * @static
	 * @return \Illuminate\View\Environment
	 */
	 public static function getViewDriver(){
		return static::$root->getViewDriver();
	 }

	/**
	 * Set the current view driver.
	 *
	 * @static
	 * @param	\Illuminate\View\Environment	$view
	 * @return void
	 */
	 public static function setViewDriver($view){
		 static::$root->setViewDriver($view);
	 }

	/**
	 * Get the translator instance.
	 *
	 * @static
	 * @return \Symfony\Component\Translation\TranslatorInterface
	 */
	 public static function getTranslator(){
		return static::$root->getTranslator();
	 }

 }
}

namespace  {
 class Password extends Illuminate\Support\Facades\Password{
	/**
	 * @var \Illuminate\Auth\Reminders\PasswordBroker $root
	 */
	 static private $root;

	/**
	 * Create a new password broker instance.
	 *
	 * @static
	 * @param	\Illuminate\Auth\Reminders\ReminderRepositoryInterface	$reminders
	 * @param	\Illuminate\Auth\UserProviderInterface	$users
	 * @param	\Illuminate\Routing\Redirector	$redirect
	 * @param	\Illuminate\Mail\Mailer	$mailer
	 * @param	string	$reminderView
	 * @return void
	 */
	 public static function __construct($reminders, $users, $redirect, $mailer, $reminderView){
		 static::$root->__construct($reminders, $users, $redirect, $mailer, $reminderView);
	 }

	/**
	 * Send a password reminder to a user.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	Closure	$callback
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function remind($credentials, $callback = null){
		return static::$root->remind($credentials, $callback);
	 }

	/**
	 * Send the password reminder e-mail.
	 *
	 * @static
	 * @param	\Illuminate\Auth\Reminders\RemindableInterface	$user
	 * @param	string	$token
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function sendReminder($user, $token, $callback = null){
		 static::$root->sendReminder($user, $token, $callback);
	 }

	/**
	 * Reset the password for the given token.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function reset($credentials, $callback){
		return static::$root->reset($credentials, $callback);
	 }

	/**
	 * Get the user for the given credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return \Illuminate\Auth\Reminders\RemindableInterface
	 */
	 public static function getUser($credentials){
		return static::$root->getUser($credentials);
	 }

 }
}

namespace  {
 class Queue extends Illuminate\Support\Facades\Queue{
	/**
	 * @var \Illuminate\Queue\QueueManager $root
	 */
	 static private $root;

	/**
	 * Create a new queue manager instance.
	 *
	 * @static
	 * @param	\Illuminate\Foundation\Application	$app
	 * @return void
	 */
	 public static function __construct($app){
		 static::$root->__construct($app);
	 }

	/**
	 * Resolve a queue connection instance.
	 *
	 * @static
	 * @param	string	$name
	 * @return \Illuminate\Queue\QueueInterface
	 */
	 public static function connection($name = null){
		return static::$root->connection($name);
	 }

	/**
	 * Add a queue connection resolver.
	 *
	 * @static
	 * @param	string	$driver
	 * @param	Closure	$resolver
	 * @return void
	 */
	 public static function addConnector($driver, $resolver){
		 static::$root->addConnector($driver, $resolver);
	 }

	/**
	 * Dynamically pass calls to the default connection.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

	/**
	 * @var \Illuminate\Queue\QueueInterface $root2
	 */
	 static private $root2;

	/**
	 * Push a new job onto the queue.
	 *
	 * @static
	 * @param	string	$job
	 * @param	mixed	$data
	 * @param	string	$queue
	 * @return void
	 */
	 public static function push($job, $data = '', $queue = null){
		 static::$root2->push($job, $data, $queue);
	 }

	/**
	 * Push a new job onto the queue after a delay.
	 *
	 * @static
	 * @param	int	$delay
	 * @param	string	$job
	 * @param	mixed	$data
	 * @param	string	$queue
	 * @return void
	 */
	 public static function later($delay, $job, $data = '', $queue = null){
		 static::$root2->later($delay, $job, $data, $queue);
	 }

	/**
	 * Pop the next job off of the queue.
	 *
	 * @static
	 * @param	string	$queue
	 * @return \Illuminate\Queue\Jobs\Job|nul
	 */
	 public static function pop($queue = null){
		return static::$root2->pop($queue);
	 }

 }
}

namespace  {
 class Redirect extends Illuminate\Support\Facades\Redirect{
	/**
	 * @var \Illuminate\Routing\Redirector $root
	 */
	 static private $root;

	/**
	 * Create a new Redirector instance.
	 *
	 * @static
	 * @param	\Illuminate\Routing\UrlGenerator	$generator
	 * @return void
	 */
	 public static function __construct($generator){
		 static::$root->__construct($generator);
	 }

	/**
	 * Create a new redirect response to the "home" route.
	 *
	 * @static
	 * @param	int	$status
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function home($status = 302){
		return static::$root->home($status);
	 }

	/**
	 * Create a new redirect response to the previous location.
	 *
	 * @static
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function back($status = 302, $headers = array()){
		return static::$root->back($status, $headers);
	 }

	/**
	 * Create a new redirect response to the current URI.
	 *
	 * @static
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function refresh($status = 302, $headers = array()){
		return static::$root->refresh($status, $headers);
	 }

	/**
	 * Create a new redirect response, while putting the current URL in the session.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$status
	 * @param	array	$headers
	 * @param	bool	$secure
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function guest($path, $status = 302, $headers = array(), $secure = null){
		return static::$root->guest($path, $status, $headers, $secure);
	 }

	/**
	 * Create a new redirect response to the previously intended location.
	 *
	 * @static
	 * @param	string	$default
	 * @param	int	$status
	 * @param	array	$headers
	 * @param	bool	$secure
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function intended($default, $status = 302, $headers = array(), $secure = null){
		return static::$root->intended($default, $status, $headers, $secure);
	 }

	/**
	 * Create a new redirect response to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$status
	 * @param	array	$headers
	 * @param	bool	$secure
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function to($path, $status = 302, $headers = array(), $secure = null){
		return static::$root->to($path, $status, $headers, $secure);
	 }

	/**
	 * Create a new redirect response to the given HTTPS path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function secure($path, $status = 302, $headers = array()){
		return static::$root->secure($path, $status, $headers);
	 }

	/**
	 * Create a new redirect response to a named route.
	 *
	 * @static
	 * @param	string	$route
	 * @param	array	$parameters
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function route($route, $parameters = array(), $status = 302, $headers = array()){
		return static::$root->route($route, $parameters, $status, $headers);
	 }

	/**
	 * Create a new redirect response to a controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @param	array	$parameters
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\RedirectResponse
	 */
	 public static function action($action, $parameters = array(), $status = 302, $headers = array()){
		return static::$root->action($action, $parameters, $status, $headers);
	 }

	/**
	 * Get the URL generator instance.
	 *
	 * @static
	 * @return \Illuminate\Routing\UrlGenerator
	 */
	 public static function getUrlGenerator(){
		return static::$root->getUrlGenerator();
	 }

	/**
	 * Set the active session store.
	 *
	 * @static
	 * @param	\Illuminate\Session\Store	$session
	 * @return void
	 */
	 public static function setSession($session){
		 static::$root->setSession($session);
	 }

 }
}

namespace  {
 class Redis extends Illuminate\Support\Facades\Redis{
	/**
	 * @var \Illuminate\Redis\Database $root
	 */
	 static private $root;

	/**
	 * Create a new Redis connection instance.
	 *
	 * @static
	 * @param	array	$servers
	 * @return void
	 */
	 public static function __construct($servers = array()){
		 static::$root->__construct($servers);
	 }

	/**
	 * Get a specific Redis connection instance.
	 *
	 * @static
	 * @param	string	$name
	 * @return \Predis\Connection\SingleConnectionInterface
	 */
	 public static function connection($name = 'default'){
		return static::$root->connection($name);
	 }

	/**
	 * Run a command against the Redis database.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function command($method, $parameters = array()){
		return static::$root->command($method, $parameters);
	 }

	/**
	 * Dynamically make a Redis command.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return static::$root->__call($method, $parameters);
	 }

 }
}

namespace  {
 class Request extends Illuminate\Support\Facades\Request{
	/**
	 * @var \Illuminate\Http\Request $root
	 */
	 static private $root;

	/**
	 * Return the Request instance.
	 *
	 * @static
	 * @return \Illuminate\Http\Request
	 */
	 public static function instance(){
		return static::$root->instance();
	 }

	/**
	 * Get the root URL for the application.
	 *
	 * @static
	 * @return string
	 */
	 public static function root(){
		return static::$root->root();
	 }

	/**
	 * Get the URL (no query string) for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function url(){
		return static::$root->url();
	 }

	/**
	 * Get the full URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function fullUrl(){
		return static::$root->fullUrl();
	 }

	/**
	 * Get the current path info for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function path(){
		return static::$root->path();
	 }

	/**
	 * Get a segment from the URI (1 based index).
	 *
	 * @static
	 * @param	string	$index
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function segment($index, $default = null){
		return static::$root->segment($index, $default);
	 }

	/**
	 * Get all of the segments for the request path.
	 *
	 * @static
	 * @return array
	 */
	 public static function segments(){
		return static::$root->segments();
	 }

	/**
	 * Determine if the current request URI matches a pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @return bool
	 */
	 public static function is($pattern){
		return static::$root->is($pattern);
	 }

	/**
	 * Determine if the request is the result of an AJAX call.
	 *
	 * @static
	 * @return bool
	 */
	 public static function ajax(){
		return static::$root->ajax();
	 }

	/**
	 * Determine if the request is over HTTPS.
	 *
	 * @static
	 * @return bool
	 */
	 public static function secure(){
		return static::$root->secure();
	 }

	/**
	 * Determine if the request contains a given input item.
	 *
	 * @static
	 * @param	string|array	$key
	 * @return bool
	 */
	 public static function has($key){
		return static::$root->has($key);
	 }

	/**
	 * Get all of the input and files for the request.
	 *
	 * @static
	 * @return array
	 */
	 public static function all(){
		return static::$root->all();
	 }

	/**
	 * Retrieve an input item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function input($key = null, $default = null){
		return static::$root->input($key, $default);
	 }

	/**
	 * Get a subset of the items from the input data.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function only($keys){
		return static::$root->only($keys);
	 }

	/**
	 * Get all of the input except for a specified array of items.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function except($keys){
		return static::$root->except($keys);
	 }

	/**
	 * Retrieve a query string item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function query($key = null, $default = null){
		return static::$root->query($key, $default);
	 }

	/**
	 * Retrieve a cookie from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function cookie($key = null, $default = null){
		return static::$root->cookie($key, $default);
	 }

	/**
	 * Retrieve a file from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return \Symfony\Component\HttpFoundation\File\UploadedFile
	 */
	 public static function file($key = null, $default = null){
		return static::$root->file($key, $default);
	 }

	/**
	 * Determine if the uploaded data contains a file.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasFile($key){
		return static::$root->hasFile($key);
	 }

	/**
	 * Retrieve a header from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function header($key = null, $default = null){
		return static::$root->header($key, $default);
	 }

	/**
	 * Retrieve a server variable from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function server($key = null, $default = null){
		return static::$root->server($key, $default);
	 }

	/**
	 * Retrieve an old input item.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function old($key = null, $default = null){
		return static::$root->old($key, $default);
	 }

	/**
	 * Flash the input for the current request to the session.
	 *
	 * @static
	 * @param	string $filter
	 * @param	array	$keys
	 * @return void
	 */
	 public static function flash($filter = null, $keys = array()){
		 static::$root->flash($filter, $keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 * @return void
	 */
	 public static function flashOnly($keys){
		 static::$root->flashOnly($keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 * @return void
	 */
	 public static function flashExcept($keys){
		 static::$root->flashExcept($keys);
	 }

	/**
	 * Flush all of the old input from the session.
	 *
	 * @static
	 * @return void
	 */
	 public static function flush(){
		 static::$root->flush();
	 }

	/**
	 * Merge new input into the current request's input array.
	 *
	 * @static
	 * @param	array	$input
	 * @return void
	 */
	 public static function merge($input){
		 static::$root->merge($input);
	 }

	/**
	 * Replace the input for the current request.
	 *
	 * @static
	 * @param	array	$input
	 * @return void
	 */
	 public static function replace($input){
		 static::$root->replace($input);
	 }

	/**
	 * Get the JSON payload for the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function json($key = null, $default = null){
		return static::$root->json($key, $default);
	 }

	/**
	 * Determine if the request is sending JSON.
	 *
	 * @static
	 * @return bool
	 */
	 public static function isJson(){
		return static::$root->isJson();
	 }

	/**
	 * Determine if the current request is asking for JSON in return.
	 *
	 * @static
	 * @return bool
	 */
	 public static function wantsJson(){
		return static::$root->wantsJson();
	 }

	/**
	 * Get the Illuminate session store implementation.
	 *
	 * @static
	 * @return \Illuminate\Session\Store
	 */
	 public static function getSessionStore(){
		return static::$root->getSessionStore();
	 }

	/**
	 * Set the Illuminate session store implementation.
	 *
	 * @static
	 * @param	\Illuminate\Session\Store	$session
	 * @return void
	 */
	 public static function setSessionStore($session){
		 static::$root->setSessionStore($session);
	 }

	/**
	 * Determine if the session store has been set.
	 *
	 * @static
	 * @return bool
	 */
	 public static function hasSessionStore(){
		return static::$root->hasSessionStore();
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data
	 * @return void
	 */
	 public static function __construct($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		 static::$root->__construct($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Sets the parameters for this request.
	 * This method also re-initializes all properties.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data
	 * @return void
	 */
	 public static function initialize($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		 static::$root->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Creates a new request with values from PHP's super globals.
	 *
	 * @static
	 * @return Request A new request
	 */
	 public static function createFromGlobals(){
		return static::$root->createFromGlobals();
	 }

	/**
	 * Creates a Request based on a given URI and configuration.
	 * The information contained in the URI always take precedence
	 * over the other information (server and parameters).
	 *
	 * @static
	 * @param	string $uri	The URI
	 * @param	string $method	The HTTP method
	 * @param	array	$parameters The query (GET) or request (POST) parameters
	 * @param	array	$cookies	The request cookies ($_COOKIE)
	 * @param	array	$files	The request files ($_FILES)
	 * @param	array	$server	The server parameters ($_SERVER)
	 * @param	string $content	The raw body data
	 * @return Request A Request instance
	 */
	 public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		return static::$root->create($uri, $method, $parameters, $cookies, $files, $server, $content);
	 }

	/**
	 * Clones a request and overrides some of its parameters.
	 *
	 * @static
	 * @param	array $query	The GET parameters
	 * @param	array $request	The POST parameters
	 * @param	array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array $cookies	The COOKIE parameters
	 * @param	array $files	The FILES parameters
	 * @param	array $server	The SERVER parameters
	 * @return Request The duplicated request
	 */
	 public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null){
		return static::$root->duplicate($query, $request, $attributes, $cookies, $files, $server);
	 }

	/**
	 * Returns the request as a string.
	 *
	 * @static
	 * @return string The request
	 */
	 public static function __toString(){
		return static::$root->__toString();
	 }

	/**
	 * Overrides the PHP global variables according to this request instance.
	 * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
	 * $_FILES is never override, see rfc1867
	 *
	 * @static
	 * @return void
	 */
	 public static function overrideGlobals(){
		 static::$root->overrideGlobals();
	 }

	/**
	 * Sets a list of trusted proxies.
	 * You should only list the reverse proxies that you manage directly.
	 *
	 * @static
	 * @param	array $proxies A list of trusted proxies
	 * @return void
	 */
	 public static function setTrustedProxies($proxies){
		 static::$root->setTrustedProxies($proxies);
	 }

	/**
	 * Gets the list of trusted proxies.
	 *
	 * @static
	 * @return array An array of trusted proxies.
	 */
	 public static function getTrustedProxies(){
		return static::$root->getTrustedProxies();
	 }

	/**
	 * Sets the name for trusted headers.
	 * The following header keys are supported:
	 * * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
	 * * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getClientHost())
	 * * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getClientPort())
	 * * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
	 * Setting an empty value allows to disable the trusted header for the given key.
	 *
	 * @static
	 * @param	string $key	The header key
	 * @param	string $value The header name
	 * @return void
	 */
	 public static function setTrustedHeaderName($key, $value){
		 static::$root->setTrustedHeaderName($key, $value);
	 }

	/**
	 * Gets the trusted proxy header name.
	 *
	 * @static
	 * @param	string $key The header key
	 * @return string The header name
	 */
	 public static function getTrustedHeaderName($key){
		return static::$root->getTrustedHeaderName($key);
	 }

	/**
	 * Normalizes a query string.
	 * It builds a normalized query string, where keys/value pairs are alphabetized,
	 * have consistent escaping and unneeded delimiters are removed.
	 *
	 * @static
	 * @param	string $qs Query string
	 * @return string A normalized query string for the Request
	 */
	 public static function normalizeQueryString($qs){
		return static::$root->normalizeQueryString($qs);
	 }

	/**
	 * Enables support for the _method request parameter to determine the intended HTTP method.
	 * Be warned that enabling this feature might lead to CSRF issues in your code.
	 * Check that you are using CSRF tokens when required.
	 * The HTTP method can only be overridden when the real HTTP method is POST.
	 *
	 * @static
	 * @return void
	 */
	 public static function enableHttpMethodParameterOverride(){
		 static::$root->enableHttpMethodParameterOverride();
	 }

	/**
	 * Checks whether support for the _method request parameter is enabled.
	 *
	 * @static
	 * @return Boolean True when the _method request parameter is enabled, false otherwise
	 */
	 public static function getHttpMethodParameterOverride(){
		return static::$root->getHttpMethodParameterOverride();
	 }

	/**
	 * Gets a "parameter" value.
	 * This method is mainly useful for libraries that want to provide some flexibility.
	 * Order of precedence: GET, PATH, POST
	 * Avoid using this method in controllers:
	 * * slow
	 * * prefer to get from a "named" source
	 * It is better to explicitly get request parameters from the appropriate
	 * public property instead (query, attributes, request).
	 *
	 * @static
	 * @param	string	$key	the key
	 * @param	mixed	$default the default value
	 * @param	Boolean $deep	is parameter deep in multidimensional array
	 * @return mixed
	 */
	 public static function get($key, $default = null, $deep = false){
		return static::$root->get($key, $default, $deep);
	 }

	/**
	 * Gets the Session.
	 *
	 * @static
	 * @return SessionInterface|null The session
	 */
	 public static function getSession(){
		return static::$root->getSession();
	 }

	/**
	 * Whether the request contains a Session which was started in one of the
	 * previous requests.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function hasPreviousSession(){
		return static::$root->hasPreviousSession();
	 }

	/**
	 * Whether the request contains a Session object.
	 * This method does not give any information about the state of the session object,
	 * like whether the session is started or not. It is just a way to check if this Request
	 * is associated with a Session instance.
	 *
	 * @static
	 * @return Boolean true when the Request contains a Session object, false otherwise
	 */
	 public static function hasSession(){
		return static::$root->hasSession();
	 }

	/**
	 * Sets the Session.
	 *
	 * @static
	 * @param	SessionInterface $session The Session
	 * @return void
	 */
	 public static function setSession($session){
		 static::$root->setSession($session);
	 }

	/**
	 * Returns the client IP addresses.
	 * The most trusted IP address is first, and the less trusted one last.
	 * The "real" client IP address is the last one, but this is also the
	 * less trusted one.
	 * Use this method carefully; you should use getClientIp() instead.
	 *
	 * @static
	 * @return array The client IP addresses
	 */
	 public static function getClientIps(){
		return static::$root->getClientIps();
	 }

	/**
	 * Returns the client IP address.
	 * This method can read the client IP address from the "X-Forwarded-For" header
	 * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
	 * header value is a comma+space separated list of IP addresses, the left-most
	 * being the original client, and each successive proxy that passed the request
	 * adding the IP address where it received the request from.
	 * If your reverse proxy uses a different header name than "X-Forwarded-For",
	 * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-ip" key.
	 *
	 * @static
	 * @return string The client IP address
	 */
	 public static function getClientIp(){
		return static::$root->getClientIp();
	 }

	/**
	 * Returns current script name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getScriptName(){
		return static::$root->getScriptName();
	 }

	/**
	 * Returns the path being requested relative to the executed script.
	 * The path info always starts with a /.
	 * Suppose this request is instantiated from /mysite on localhost:
	 * * http://localhost/mysite              returns an empty string
	 * * http://localhost/mysite/about        returns '/about'
	 * * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
	 * * http://localhost/mysite/about?var=1  returns '/about'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)
	 */
	 public static function getPathInfo(){
		return static::$root->getPathInfo();
	 }

	/**
	 * Returns the root path from which this request is executed.
	 * Suppose that an index.php file instantiates this request object:
	 * * http://localhost/index.php         returns an empty string
	 * * http://localhost/index.php/page    returns an empty string
	 * * http://localhost/web/index.php     returns '/web'
	 * * http://localhost/we%20b/index.php  returns '/we%20b'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)
	 */
	 public static function getBasePath(){
		return static::$root->getBasePath();
	 }

	/**
	 * Returns the root url from which this request is executed.
	 * The base URL never ends with a /.
	 * This is similar to getBasePath(), except that it also includes the
	 * script filename (e.g. index.php) if one exists.
	 *
	 * @static
	 * @return string The raw url (i.e. not urldecoded)
	 */
	 public static function getBaseUrl(){
		return static::$root->getBaseUrl();
	 }

	/**
	 * Gets the request's scheme.
	 *
	 * @static
	 * @return string
	 */
	 public static function getScheme(){
		return static::$root->getScheme();
	 }

	/**
	 * Returns the port on which the request is made.
	 * This method can read the client port from the "X-Forwarded-Port" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Port" header must contain the client port.
	 * If your reverse proxy uses a different header name than "X-Forwarded-Port",
	 * configure it via "setTrustedHeaderName()" with the "client-port" key.
	 *
	 * @static
	 * @return string
	 */
	 public static function getPort(){
		return static::$root->getPort();
	 }

	/**
	 * Returns the user.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getUser(){
		return static::$root->getUser();
	 }

	/**
	 * Returns the password.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getPassword(){
		return static::$root->getPassword();
	 }

	/**
	 * Gets the user info.
	 *
	 * @static
	 * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
	 */
	 public static function getUserInfo(){
		return static::$root->getUserInfo();
	 }

	/**
	 * Returns the HTTP host being requested.
	 * The port name will be appended to the host if it's non-standard.
	 *
	 * @static
	 * @return string
	 */
	 public static function getHttpHost(){
		return static::$root->getHttpHost();
	 }

	/**
	 * Returns the requested URI.
	 *
	 * @static
	 * @return string The raw URI (i.e. not urldecoded)
	 */
	 public static function getRequestUri(){
		return static::$root->getRequestUri();
	 }

	/**
	 * Gets the scheme and HTTP host.
	 * If the URL was called with basic authentication, the user
	 * and the password are not added to the generated string.
	 *
	 * @static
	 * @return string The scheme and HTTP host
	 */
	 public static function getSchemeAndHttpHost(){
		return static::$root->getSchemeAndHttpHost();
	 }

	/**
	 * Generates a normalized URI for the Request.
	 *
	 * @static
	 * @return string A normalized URI for the Request
	 */
	 public static function getUri(){
		return static::$root->getUri();
	 }

	/**
	 * Generates a normalized URI for the given path.
	 *
	 * @static
	 * @param	string $path A path to use instead of the current one
	 * @return string The normalized URI for the path
	 */
	 public static function getUriForPath($path){
		return static::$root->getUriForPath($path);
	 }

	/**
	 * Generates the normalized query string for the Request.
	 * It builds a normalized query string, where keys/value pairs are alphabetized
	 * and have consistent escaping.
	 *
	 * @static
	 * @return string|null A normalized query string for the Request
	 */
	 public static function getQueryString(){
		return static::$root->getQueryString();
	 }

	/**
	 * Checks whether the request is secure or not.
	 * This method can read the client port from the "X-Forwarded-Proto" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
	 * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
	 * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-proto" key.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isSecure(){
		return static::$root->isSecure();
	 }

	/**
	 * Returns the host name.
	 * This method can read the client port from the "X-Forwarded-Host" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * The "X-Forwarded-Host" header must contain the client host name.
	 * If your reverse proxy uses a different header name than "X-Forwarded-Host",
	 * configure it via "setTrustedHeaderName()" with the "client-host" key.
	 *
	 * @static
	 * @return string
	 */
	 public static function getHost(){
		return static::$root->getHost();
	 }

	/**
	 * Sets the request method.
	 *
	 * @static
	 * @param	string $method
	 * @return void
	 */
	 public static function setMethod($method){
		 static::$root->setMethod($method);
	 }

	/**
	 * Gets the request "intended" method.
	 * If the X-HTTP-Method-Override header is set, and if the method is a POST,
	 * then it is used to determine the "real" intended HTTP method.
	 * The _method request parameter can also be used to determine the HTTP method,
	 * but only if enableHttpMethodParameterOverride() has been called.
	 * The method is always an uppercased string.
	 *
	 * @static
	 * @return string The request method
	 */
	 public static function getMethod(){
		return static::$root->getMethod();
	 }

	/**
	 * Gets the "real" request method.
	 *
	 * @static
	 * @return string The request method
	 */
	 public static function getRealMethod(){
		return static::$root->getRealMethod();
	 }

	/**
	 * Gets the mime type associated with the format.
	 *
	 * @static
	 * @param	string $format The format
	 * @return string The associated mime type (null if not found)
	 */
	 public static function getMimeType($format){
		return static::$root->getMimeType($format);
	 }

	/**
	 * Gets the format associated with the mime type.
	 *
	 * @static
	 * @param	string $mimeType The associated mime type
	 * @return string|null The format (null if not found)
	 */
	 public static function getFormat($mimeType){
		return static::$root->getFormat($mimeType);
	 }

	/**
	 * Associates a format with mime types.
	 *
	 * @static
	 * @param	string	$format	The format
	 * @param	string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
	 * @return void
	 */
	 public static function setFormat($format, $mimeTypes){
		 static::$root->setFormat($format, $mimeTypes);
	 }

	/**
	 * Gets the request format.
	 * Here is the process to determine the format:
	 * * format defined by the user (with setRequestFormat())
	 * * _format request parameter
	 * * $default
	 *
	 * @static
	 * @param	string $default The default format
	 * @return string The request format
	 */
	 public static function getRequestFormat($default = 'html'){
		return static::$root->getRequestFormat($default);
	 }

	/**
	 * Sets the request format.
	 *
	 * @static
	 * @param	string $format The request format.
	 * @return void
	 */
	 public static function setRequestFormat($format){
		 static::$root->setRequestFormat($format);
	 }

	/**
	 * Gets the format associated with the request.
	 *
	 * @static
	 * @return string|null The format (null if no content type is present)
	 */
	 public static function getContentType(){
		return static::$root->getContentType();
	 }

	/**
	 * Sets the default locale.
	 *
	 * @static
	 * @param	string $locale
	 * @return void
	 */
	 public static function setDefaultLocale($locale){
		 static::$root->setDefaultLocale($locale);
	 }

	/**
	 * Sets the locale.
	 *
	 * @static
	 * @param	string $locale
	 * @return void
	 */
	 public static function setLocale($locale){
		 static::$root->setLocale($locale);
	 }

	/**
	 * Get the locale.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return static::$root->getLocale();
	 }

	/**
	 * Checks if the request method is of specified type.
	 *
	 * @static
	 * @param	string $method Uppercase request method (GET, POST etc).
	 * @return Boolean
	 */
	 public static function isMethod($method){
		return static::$root->isMethod($method);
	 }

	/**
	 * Checks whether the method is safe or not.
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isMethodSafe(){
		return static::$root->isMethodSafe();
	 }

	/**
	 * Returns the request body content.
	 *
	 * @static
	 * @param	Boolean $asResource If true, a resource will be returned
	 * @return string|resource The request body content or a resource to read the body stream.
	 */
	 public static function getContent($asResource = false){
		return static::$root->getContent($asResource);
	 }

	/**
	 * Gets the Etags.
	 *
	 * @static
	 * @return array The entity tags
	 */
	 public static function getETags(){
		return static::$root->getETags();
	 }

	/**
	 * 
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isNoCache(){
		return static::$root->isNoCache();
	 }

	/**
	 * Returns the preferred language.
	 *
	 * @static
	 * @param	array $locales An array of ordered available locales
	 * @return string|null The preferred locale
	 */
	 public static function getPreferredLanguage($locales = null){
		return static::$root->getPreferredLanguage($locales);
	 }

	/**
	 * Gets a list of languages acceptable by the client browser.
	 *
	 * @static
	 * @return array Languages ordered in the user browser preferences
	 */
	 public static function getLanguages(){
		return static::$root->getLanguages();
	 }

	/**
	 * Gets a list of charsets acceptable by the client browser.
	 *
	 * @static
	 * @return array List of charsets in preferable order
	 */
	 public static function getCharsets(){
		return static::$root->getCharsets();
	 }

	/**
	 * Gets a list of content types acceptable by the client browser
	 *
	 * @static
	 * @return array List of content types in preferable order
	 */
	 public static function getAcceptableContentTypes(){
		return static::$root->getAcceptableContentTypes();
	 }

	/**
	 * Returns true if the request is a XMLHttpRequest.
	 * It works if your JavaScript library set an X-Requested-With HTTP header.
	 * It is known to work with common JavaScript frameworks:
	 *
	 * @static
	 * @return Boolean true if the request is an XMLHttpRequest, false otherwise
	 */
	 public static function isXmlHttpRequest(){
		return static::$root->isXmlHttpRequest();
	 }

 }
}

namespace  {
 class Response{
	/**
	 * @var \Illuminate\Support\Facades\Response $root
	 */
	 static private $root;

	/**
	 * Return a new response from the application.
	 *
	 * @static
	 * @param	string	$content
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function make($content = '', $status = 200, $headers = array()){
		return static::$root->make($content, $status, $headers);
	 }

	/**
	 * Return a new view response from the application.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function view($view, $data = array(), $status = 200, $headers = array()){
		return static::$root->view($view, $data, $status, $headers);
	 }

	/**
	 * Return a new JSON response from the application.
	 *
	 * @static
	 * @param	string|array	$data
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Illuminate\Http\JsonResponse
	 */
	 public static function json($data = array(), $status = 200, $headers = array()){
		return static::$root->json($data, $status, $headers);
	 }

	/**
	 * Return a new streamed response from the application.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Symfony\Component\HttpFoundation\StreamedResponse
	 */
	 public static function stream($callback, $status = 200, $headers = array()){
		return static::$root->stream($callback, $status, $headers);
	 }

	/**
	 * Create a new file download response.
	 *
	 * @static
	 * @param	SplFileInfo|string	$file
	 * @param	int	$status
	 * @param	array	$headers
	 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	 public static function download($file, $name = null, $headers = array()){
		return static::$root->download($file, $name, $headers);
	 }

 }
}

namespace  {
 class Route extends Illuminate\Support\Facades\Route{
	/**
	 * @var \Illuminate\Routing\Router $root
	 */
	 static private $root;

	/**
	 * Create a new router instance.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function __construct($container = null){
		 static::$root->__construct($container);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function get($pattern, $action){
		return static::$root->get($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function post($pattern, $action){
		return static::$root->post($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function put($pattern, $action){
		return static::$root->put($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function patch($pattern, $action){
		return static::$root->patch($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function delete($pattern, $action){
		return static::$root->delete($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function options($pattern, $action){
		return static::$root->options($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$method
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function match($method, $pattern, $action){
		return static::$root->match($method, $pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return \Illuminate\Routing\Route
	 */
	 public static function any($pattern, $action){
		return static::$root->any($pattern, $action);
	 }

	/**
	 * Register an array of controllers with wildcard routing.
	 *
	 * @static
	 * @param	array	$controllers
	 * @return void
	 */
	 public static function controllers($controllers){
		 static::$root->controllers($controllers);
	 }

	/**
	 * Route a controller to a URI with wildcard routing.
	 *
	 * @static
	 * @param	string	$uri
	 * @param	string	$controller
	 * @param	array	$names
	 * @return \Illuminate\Routing\Route
	 */
	 public static function controller($uri, $controller, $names = array()){
		return static::$root->controller($uri, $controller, $names);
	 }

	/**
	 * Route a resource to a controller.
	 *
	 * @static
	 * @param	string	$resource
	 * @param	string	$controller
	 * @param	array	$options
	 * @return void
	 */
	 public static function resource($resource, $controller, $options = array()){
		 static::$root->resource($resource, $controller, $options);
	 }

	/**
	 * Get the base resource URI for a given resource.
	 *
	 * @static
	 * @param	string	$resource
	 * @return string
	 */
	 public static function getResourceUri($resource){
		return static::$root->getResourceUri($resource);
	 }

	/**
	 * Format a resource wildcard parameter.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function getResourceWildcard($value){
		return static::$root->getResourceWildcard($value);
	 }

	/**
	 * Create a route group with shared attributes.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	Closure	$callback
	 * @return void
	 */
	 public static function group($attributes, $callback){
		 static::$root->group($attributes, $callback);
	 }

	/**
	 * Get the response for a given request.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function dispatch($request){
		return static::$root->dispatch($request);
	 }

	/**
	 * Register a "before" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function before($callback){
		 static::$root->before($callback);
	 }

	/**
	 * Register an "after" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function after($callback){
		 static::$root->after($callback);
	 }

	/**
	 * Register a "close" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function close($callback){
		 static::$root->close($callback);
	 }

	/**
	 * Register a "finish" routing filters.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function finish($callback){
		 static::$root->finish($callback);
	 }

	/**
	 * Register a new filter with the application.
	 *
	 * @static
	 * @param	string	$name
	 * @param	Closure|string	$callback
	 * @return void
	 */
	 public static function filter($name, $callback){
		 static::$root->filter($name, $callback);
	 }

	/**
	 * Get a registered filter callback.
	 *
	 * @static
	 * @param	string	$name
	 * @return Closure
	 */
	 public static function getFilter($name){
		return static::$root->getFilter($name);
	 }

	/**
	 * Tie a registered filter to a URI pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	string|array	$names
	 * @param	array|null	$methods
	 * @return void
	 */
	 public static function when($pattern, $names, $methods = null){
		 static::$root->when($pattern, $names, $methods);
	 }

	/**
	 * Find the patterned filters matching a request.
	 *
	 * @static
	 * @param	\Illuminate\Http\Request	$request
	 * @return array
	 */
	 public static function findPatternFilters($request){
		return static::$root->findPatternFilters($request);
	 }

	/**
	 * Call the finish" global filter.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @param	\Symfony\Component\HttpFoundation\Response	$response
	 * @return mixed
	 */
	 public static function callFinishFilter($request, $response){
		return static::$root->callFinishFilter($request, $response);
	 }

	/**
	 * Call the "close" global filter.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @param	\Symfony\Component\HttpFoundation\Response	$response
	 * @return mixed
	 */
	 public static function callCloseFilter($request, $response){
		return static::$root->callCloseFilter($request, $response);
	 }

	/**
	 * Set a global where pattern on all routes
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$pattern
	 * @return void
	 */
	 public static function pattern($key, $pattern){
		 static::$root->pattern($key, $pattern);
	 }

	/**
	 * Register a model binder for a wildcard.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$class
	 * @return void
	 */
	 public static function model($key, $class, $callback = null){
		 static::$root->model($key, $class, $callback);
	 }

	/**
	 * Register a custom parameter binder.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$binder
	 * @return void
	 */
	 public static function bind($key, $binder){
		 static::$root->bind($key, $binder);
	 }

	/**
	 * Determine if a given key has a registered binder.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasBinder($key){
		return static::$root->hasBinder($key);
	 }

	/**
	 * Call a binder for a given wildcard.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @param	\Illuminate\Routing\Route	$route
	 * @return mixed
	 */
	 public static function performBinding($key, $value, $route){
		return static::$root->performBinding($key, $value, $route);
	 }

	/**
	 * Prepare the given value as a Response object.
	 *
	 * @static
	 * @param	mixed	$value
	 * @param	\Illuminate\Http\Request	$request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	 public static function prepare($value, $request){
		return static::$root->prepare($value, $request);
	 }

	/**
	 * Get the current route name.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function currentRouteName(){
		return static::$root->currentRouteName();
	 }

	/**
	 * Determine if the current route has a given name.
	 *
	 * @static
	 * @param	string	$name
	 * @return bool
	 */
	 public static function currentRouteNamed($name){
		return static::$root->currentRouteNamed($name);
	 }

	/**
	 * Get the current route action.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function currentRouteAction(){
		return static::$root->currentRouteAction();
	 }

	/**
	 * Determine if the current route uses a given controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @return bool
	 */
	 public static function currentRouteUses($action){
		return static::$root->currentRouteUses($action);
	 }

	/**
	 * Determine if route filters are enabled.
	 *
	 * @static
	 * @return bool
	 */
	 public static function filtersEnabled(){
		return static::$root->filtersEnabled();
	 }

	/**
	 * Enable the running of filters.
	 *
	 * @static
	 * @return void
	 */
	 public static function enableFilters(){
		 static::$root->enableFilters();
	 }

	/**
	 * Disable the running of all filters.
	 *
	 * @static
	 * @return void
	 */
	 public static function disableFilters(){
		 static::$root->disableFilters();
	 }

	/**
	 * Retrieve the entire route collection.
	 *
	 * @static
	 * @return \Symfony\Component\Routing\RouteCollection
	 */
	 public static function getRoutes(){
		return static::$root->getRoutes();
	 }

	/**
	 * Get the current request being dispatched.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return static::$root->getRequest();
	 }

	/**
	 * Get the current route being executed.
	 *
	 * @static
	 * @return \Illuminate\Routing\Route
	 */
	 public static function getCurrentRoute(){
		return static::$root->getCurrentRoute();
	 }

	/**
	 * Set the current route on the router.
	 *
	 * @static
	 * @param	\Illuminate\Routing\Route	$route
	 * @return void
	 */
	 public static function setCurrentRoute($route){
		 static::$root->setCurrentRoute($route);
	 }

	/**
	 * Get the filters defined on the router.
	 *
	 * @static
	 * @return array
	 */
	 public static function getFilters(){
		return static::$root->getFilters();
	 }

	/**
	 * Get the global filters defined on the router.
	 *
	 * @static
	 * @return array
	 */
	 public static function getGlobalFilters(){
		return static::$root->getGlobalFilters();
	 }

	/**
	 * Get the controller inspector instance.
	 *
	 * @static
	 * @return \Illuminate\Routing\Controllers\Inspector
	 */
	 public static function getInspector(){
		return static::$root->getInspector();
	 }

	/**
	 * Set the controller inspector instance.
	 *
	 * @static
	 * @param	\Illuminate\Routing\Controllers\Inspector	$inspector
	 * @return void
	 */
	 public static function setInspector($inspector){
		 static::$root->setInspector($inspector);
	 }

	/**
	 * Get the container used by the router.
	 *
	 * @static
	 * @return \Illuminate\Container\Container
	 */
	 public static function getContainer(){
		return static::$root->getContainer();
	 }

	/**
	 * Set the container instance on the router.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function setContainer($container){
		 static::$root->setContainer($container);
	 }

 }
}

namespace  {
 class Schema extends Illuminate\Support\Facades\Schema{
	/**
	 * @var \Illuminate\Database\Schema\MySqlBuilder $root
	 */
	 static private $root;

	/**
	 * Determine if the given table exists.
	 *
	 * @static
	 * @param	string	$table
	 * @return bool
	 */
	 public static function hasTable($table){
		return static::$root->hasTable($table);
	 }

	/**
	 * Create a new database Schema manager.
	 *
	 * @static
	 * @param	\Illuminate\Database\Connection	$connection
	 * @return void
	 */
	 public static function __construct($connection){
		 static::$root->__construct($connection);
	 }

	/**
	 * Determine if the given table has a given column.
	 *
	 * @static
	 * @param	string	$table
	 * @param	string	$column
	 * @return bool
	 */
	 public static function hasColumn($table, $column){
		return static::$root->hasColumn($table, $column);
	 }

	/**
	 * Modify a table on the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @param	Closure	$callback
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	 public static function table($table, $callback){
		return static::$root->table($table, $callback);
	 }

	/**
	 * Create a new table on the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @param	Closure	$callback
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	 public static function create($table, $callback){
		return static::$root->create($table, $callback);
	 }

	/**
	 * Drop a table from the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	 public static function drop($table){
		return static::$root->drop($table);
	 }

	/**
	 * Drop a table from the schema if it exists.
	 *
	 * @static
	 * @param	string	$table
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	 public static function dropIfExists($table){
		return static::$root->dropIfExists($table);
	 }

	/**
	 * Rename a table on the schema.
	 *
	 * @static
	 * @param	string	$from
	 * @param	string	$to
	 * @return \Illuminate\Database\Schema\Blueprint
	 */
	 public static function rename($from, $to){
		return static::$root->rename($from, $to);
	 }

	/**
	 * Get the database connection instance.
	 *
	 * @static
	 * @return \Illuminate\Database\Connection
	 */
	 public static function getConnection(){
		return static::$root->getConnection();
	 }

	/**
	 * Set the database connection instance.
	 *
	 * @static
	 * @param	\Illuminate\Database\Connection
	 * @return \Illuminate\Database\Schema\Builder
	 */
	 public static function setConnection($connection){
		return static::$root->setConnection($connection);
	 }

 }
}

namespace  {
 class Seeder extends Illuminate\Database\Seeder{
	/**
	 * @var \Illuminate\Database\Seeder $root
	 */
	 static private $root;

 }
}

namespace  {
 class Session extends Illuminate\Support\Facades\Session{
	/**
	 * @var \Illuminate\Session\Store $root
	 */
	 static private $root;

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function start(){
		 static::$root->start();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function save(){
		 static::$root->save();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function has($name){
		 static::$root->has($name);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function get($name, $default = null){
		 static::$root->get($name, $default);
	 }

	/**
	 * Determine if the session contains old input.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasOldInput($key){
		return static::$root->hasOldInput($key);
	 }

	/**
	 * Get the requested item from the flashed input array.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function getOldInput($key = null, $default = null){
		return static::$root->getOldInput($key, $default);
	 }

	/**
	 * Get the CSRF token value.
	 *
	 * @static
	 * @return string
	 */
	 public static function getToken(){
		return static::$root->getToken();
	 }

	/**
	 * Get the CSRF token value.
	 *
	 * @static
	 * @return string
	 */
	 public static function token(){
		return static::$root->token();
	 }

	/**
	 * Put a key / value pair in the session.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function put($key, $value){
		 static::$root->put($key, $value);
	 }

	/**
	 * Push a value onto a session array.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function push($key, $value){
		 static::$root->push($key, $value);
	 }

	/**
	 * Flash a key / value pair to the session.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function flash($key, $value){
		 static::$root->flash($key, $value);
	 }

	/**
	 * Flash an input array to the session.
	 *
	 * @static
	 * @param	array	$value
	 * @return void
	 */
	 public static function flashInput($value){
		 static::$root->flashInput($value);
	 }

	/**
	 * Reflash all of the session flash data.
	 *
	 * @static
	 * @return void
	 */
	 public static function reflash(){
		 static::$root->reflash();
	 }

	/**
	 * Reflash a subset of the current flash data.
	 *
	 * @static
	 * @param	array|dynamic	$keys
	 * @return void
	 */
	 public static function keep($keys = null){
		 static::$root->keep($keys);
	 }

	/**
	 * Remove an item from the session.
	 *
	 * @static
	 * @param	string	$key
	 * @return void
	 */
	 public static function forget($key){
		 static::$root->forget($key);
	 }

	/**
	 * Remove all of the items from the session.
	 *
	 * @static
	 * @return void
	 */
	 public static function flush(){
		 static::$root->flush();
	 }

	/**
	 * Generate a new session identifier.
	 *
	 * @static
	 * @return string
	 */
	 public static function regenerate(){
		return static::$root->regenerate();
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	SessionStorageInterface $storage	A SessionStorageInterface instance.
	 * @param	AttributeBagInterface	$attributes An AttributeBagInterface instance, (defaults null for default AttributeBag)
	 * @param	FlashBagInterface	$flashes	A FlashBagInterface instance (defaults null for default FlashBag)
	 * @return void
	 */
	 public static function __construct($storage = null, $attributes = null, $flashes = null){
		 static::$root->__construct($storage, $attributes, $flashes);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function set($name, $value){
		 static::$root->set($name, $value);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function all(){
		 static::$root->all();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function replace($attributes){
		 static::$root->replace($attributes);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function remove($name){
		 static::$root->remove($name);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function clear(){
		 static::$root->clear();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function isStarted(){
		 static::$root->isStarted();
	 }

	/**
	 * Returns an iterator for attributes.
	 *
	 * @static
	 * @return \ArrayIterator An \ArrayIterator instance
	 */
	 public static function getIterator(){
		return static::$root->getIterator();
	 }

	/**
	 * Returns the number of attributes.
	 *
	 * @static
	 * @return int The number of attributes
	 */
	 public static function count(){
		return static::$root->count();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function invalidate($lifetime = null){
		 static::$root->invalidate($lifetime);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function migrate($destroy = false, $lifetime = null){
		 static::$root->migrate($destroy, $lifetime);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function getId(){
		 static::$root->getId();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function setId($id){
		 static::$root->setId($id);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function getName(){
		 static::$root->getName();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function setName($name){
		 static::$root->setName($name);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function getMetadataBag(){
		 static::$root->getMetadataBag();
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function registerBag($bag){
		 static::$root->registerBag($bag);
	 }

	/**
	 * {@inheritdoc}
	 *
	 * @static
	 * @return void
	 */
	 public static function getBag($name){
		 static::$root->getBag($name);
	 }

	/**
	 * Gets the flashbag interface.
	 *
	 * @static
	 * @return FlashBagInterface
	 */
	 public static function getFlashBag(){
		return static::$root->getFlashBag();
	 }

 }
}

namespace  {
 class Str{
	/**
	 * @var \Illuminate\Support\Str $root
	 */
	 static private $root;

	/**
	 * Transliterate a UTF-8 value to ASCII.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function ascii($value){
		return static::$root->ascii($value);
	 }

	/**
	 * Convert a value to camel case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function camel($value){
		return static::$root->camel($value);
	 }

	/**
	 * Determine if a given string contains a given sub-string.
	 *
	 * @static
	 * @param	string	$haystack
	 * @param	string|array	$needle
	 * @return bool
	 */
	 public static function contains($haystack, $needle){
		return static::$root->contains($haystack, $needle);
	 }

	/**
	 * Determine if a given string ends with a given needle.
	 *
	 * @static
	 * @param	string $haystack
	 * @param	string $needle
	 * @return bool
	 */
	 public static function endsWith($haystack, $needle){
		return static::$root->endsWith($haystack, $needle);
	 }

	/**
	 * Cap a string with a single instance of a given value.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$cap
	 * @return string
	 */
	 public static function finish($value, $cap){
		return static::$root->finish($value, $cap);
	 }

	/**
	 * Determine if a given string matches a given pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	string	$value
	 * @return bool
	 */
	 public static function is($pattern, $value){
		return static::$root->is($pattern, $value);
	 }

	/**
	 * Limit the number of characters in a string.
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$limit
	 * @param	string	$end
	 * @return string
	 */
	 public static function limit($value, $limit = 100, $end = '...'){
		return static::$root->limit($value, $limit, $end);
	 }

	/**
	 * Convert the given string to lower-case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function lower($value){
		return static::$root->lower($value);
	 }

	/**
	 * Limit the number of words in a string.
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$words
	 * @param	string	$end
	 * @return string
	 */
	 public static function words($value, $words = 100, $end = '...'){
		return static::$root->words($value, $words, $end);
	 }

	/**
	 * Get the plural form of an English word.
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$count
	 * @return string
	 */
	 public static function plural($value, $count = 2){
		return static::$root->plural($value, $count);
	 }

	/**
	 * Generate a more truly "random" alpha-numeric string.
	 *
	 * @static
	 * @param	int	$length
	 * @return string
	 */
	 public static function random($length = 16){
		return static::$root->random($length);
	 }

	/**
	 * Generate a "random" alpha-numeric string.
	 * Should not be considered sufficient for cryptography, etc.
	 *
	 * @static
	 * @param	int	$length
	 * @return string
	 */
	 public static function quickRandom($length = 16){
		return static::$root->quickRandom($length);
	 }

	/**
	 * Convert the given string to upper-case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function upper($value){
		return static::$root->upper($value);
	 }

	/**
	 * Get the singular form of an English word.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function singular($value){
		return static::$root->singular($value);
	 }

	/**
	 * Generate a URL friendly "slug" from a given string.
	 *
	 * @static
	 * @param	string	$title
	 * @param	string	$separator
	 * @return string
	 */
	 public static function slug($title, $separator = '-'){
		return static::$root->slug($title, $separator);
	 }

	/**
	 * Convert a string to snake case.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$delimiter
	 * @return string
	 */
	 public static function snake($value, $delimiter = '_'){
		return static::$root->snake($value, $delimiter);
	 }

	/**
	 * Determine if a string starts with a given needle.
	 *
	 * @static
	 * @param	string	$haystack
	 * @param	string|array	$needles
	 * @return bool
	 */
	 public static function startsWith($haystack, $needles){
		return static::$root->startsWith($haystack, $needles);
	 }

	/**
	 * Convert a value to studly caps case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function studly($value){
		return static::$root->studly($value);
	 }

	/**
	 * Register a custom string macro.
	 *
	 * @static
	 * @param	string	$name
	 * @param	callable	$macro
	 * @return void
	 */
	 public static function macro($name, $macro){
		 static::$root->macro($name, $macro);
	 }

	/**
	 * Dynamically handle calls to the string class.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return static::$root->__callStatic($method, $parameters);
	 }

 }
}

namespace  {
 class URL extends Illuminate\Support\Facades\URL{
	/**
	 * @var \Illuminate\Routing\UrlGenerator $root
	 */
	 static private $root;

	/**
	 * Create a new URL Generator instance.
	 *
	 * @static
	 * @param	\Symfony\Component\Routing\RouteCollection	$routes
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return void
	 */
	 public static function __construct($routes, $request){
		 static::$root->__construct($routes, $request);
	 }

	/**
	 * Get the full URL for the current request.
	 *
	 * @static
	 * @return string
	 */
	 public static function full(){
		return static::$root->full();
	 }

	/**
	 * Get the current URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function current(){
		return static::$root->current();
	 }

	/**
	 * Get the URL for the previous request.
	 *
	 * @static
	 * @return string
	 */
	 public static function previous(){
		return static::$root->previous();
	 }

	/**
	 * Generate a absolute URL to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	mixed	$parameters
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function to($path, $parameters = array(), $secure = null){
		return static::$root->to($path, $parameters, $secure);
	 }

	/**
	 * Generate a secure, absolute URL to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	array	$parameters
	 * @return string
	 */
	 public static function secure($path, $parameters = array()){
		return static::$root->secure($path, $parameters);
	 }

	/**
	 * Generate a URL to an application asset.
	 *
	 * @static
	 * @param	string	$path
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function asset($path, $secure = null){
		return static::$root->asset($path, $secure);
	 }

	/**
	 * Generate a URL to a secure asset.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function secureAsset($path){
		return static::$root->secureAsset($path);
	 }

	/**
	 * Get the URL to a named route.
	 *
	 * @static
	 * @param	string	$name
	 * @param	mixed	$parameters
	 * @param	bool	$absolute
	 * @return string
	 */
	 public static function route($name, $parameters = array(), $absolute = true){
		return static::$root->route($name, $parameters, $absolute);
	 }

	/**
	 * Get the URL to a controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @param	mixed	$parameters
	 * @param	bool	$absolute
	 * @return string
	 */
	 public static function action($action, $parameters = array(), $absolute = true){
		return static::$root->action($action, $parameters, $absolute);
	 }

	/**
	 * Determine if the given path is a valid URL.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function isValidUrl($path){
		return static::$root->isValidUrl($path);
	 }

	/**
	 * Get the request instance.
	 *
	 * @static
	 * @return \Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return static::$root->getRequest();
	 }

	/**
	 * Set the current request instance.
	 *
	 * @static
	 * @param	\Symfony\Component\HttpFoundation\Request	$request
	 * @return void
	 */
	 public static function setRequest($request){
		 static::$root->setRequest($request);
	 }

	/**
	 * Get the Symfony URL generator instance.
	 *
	 * @static
	 * @return \Symfony\Component\Routing\Generator\UrlGenerator
	 */
	 public static function getGenerator(){
		return static::$root->getGenerator();
	 }

	/**
	 * Get the Symfony URL generator instance.
	 *
	 * @static
	 * @param	\Symfony\Component\Routing\Generator\UrlGenerator	$generator
	 * @return void
	 */
	 public static function setGenerator($generator){
		 static::$root->setGenerator($generator);
	 }

 }
}

namespace  {
 class Validator extends Illuminate\Support\Facades\Validator{
	/**
	 * @var \Illuminate\Validation\Factory $root
	 */
	 static private $root;

	/**
	 * Create a new Validator factory instance.
	 *
	 * @static
	 * @param	\Symfony\Component\Translation\TranslatorInterface	$translator
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function __construct($translator, $container = null){
		 static::$root->__construct($translator, $container);
	 }

	/**
	 * Create a new Validator instance.
	 *
	 * @static
	 * @param	array	$data
	 * @param	array	$rules
	 * @param	array	$messages
	 * @return \Illuminate\Validation\Validator
	 */
	 public static function make($data, $rules, $messages = array()){
		return static::$root->make($data, $rules, $messages);
	 }

	/**
	 * Register a custom validator extension.
	 *
	 * @static
	 * @param	string	$rule
	 * @param	Closure|string	$extension
	 * @return void
	 */
	 public static function extend($rule, $extension){
		 static::$root->extend($rule, $extension);
	 }

	/**
	 * Register a custom implicit validator extension.
	 *
	 * @static
	 * @param	string	$rule
	 * @param	Closure $extension
	 * @return void
	 */
	 public static function extendImplicit($rule, $extension){
		 static::$root->extendImplicit($rule, $extension);
	 }

	/**
	 * Set the Validator instance resolver.
	 *
	 * @static
	 * @param	Closure	$resolver
	 * @return void
	 */
	 public static function resolver($resolver){
		 static::$root->resolver($resolver);
	 }

	/**
	 * Get the Translator implementation.
	 *
	 * @static
	 * @return \Symfony\Component\Translation\TranslatorInterface
	 */
	 public static function getTranslator(){
		return static::$root->getTranslator();
	 }

	/**
	 * Get the Presence Verifier implementation.
	 *
	 * @static
	 * @return \Illuminate\Validation\PresenceVerifierInterface
	 */
	 public static function getPresenceVerifier(){
		return static::$root->getPresenceVerifier();
	 }

	/**
	 * Set the Presence Verifier implementation.
	 *
	 * @static
	 * @param	\Illuminate\Validation\PresenceVerifierInterface	$presenceVerifier
	 * @return void
	 */
	 public static function setPresenceVerifier($presenceVerifier){
		 static::$root->setPresenceVerifier($presenceVerifier);
	 }

 }
}

namespace  {
 class View extends Illuminate\Support\Facades\View{
	/**
	 * @var \Robbo\Presenter\View\Environment $root
	 */
	 static private $root;

	/**
	 * Get a evaluated view contents for the given view.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	array	$mergeData
	 * @return Illuminate\View\View
	 */
	 public static function make($view, $data = array(), $mergeData = array()){
		return static::$root->make($view, $data, $mergeData);
	 }

	/**
	 * Add a piece of shared data to the environment.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function share($key, $value = null){
		 static::$root->share($key, $value);
	 }

	/**
	 * If this variable implements Robbo\Presenter\PresentableInterface then turn it into a presenter.
	 *
	 * @static
	 * @param	mixed $value
	 * @return mixed $value
	 */
	 public static function makePresentable($value){
		return static::$root->makePresentable($value);
	 }

	/**
	 * Create a new view environment instance.
	 *
	 * @static
	 * @param	\Illuminate\View\Engines\EngineResolver	$engines
	 * @param	\Illuminate\View\ViewFinderInterface	$finder
	 * @param	\Illuminate\Events\Dispatcher	$events
	 * @return void
	 */
	 public static function __construct($engines, $finder, $events){
		 static::$root->__construct($engines, $finder, $events);
	 }

	/**
	 * Get a evaluated view contents for a named view.
	 *
	 * @static
	 * @param	string $view
	 * @param	mixed $data
	 * @return \Illuminate\View\View
	 */
	 public static function of($view, $data = array()){
		return static::$root->of($view, $data);
	 }

	/**
	 * Register a named view.
	 *
	 * @static
	 * @param	string $view
	 * @param	string $name
	 * @return void
	 */
	 public static function name($view, $name){
		 static::$root->name($view, $name);
	 }

	/**
	 * Determine if a given view exists.
	 *
	 * @static
	 * @param	string	$view
	 * @return bool
	 */
	 public static function exists($view){
		return static::$root->exists($view);
	 }

	/**
	 * Get the rendered contents of a partial from a loop.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	string	$iterator
	 * @param	string	$empty
	 * @return string
	 */
	 public static function renderEach($view, $data, $iterator, $empty = 'raw|'){
		return static::$root->renderEach($view, $data, $iterator, $empty);
	 }

	/**
	 * Register a view composer event.
	 *
	 * @static
	 * @param	array|string	$views
	 * @param	Closure|string	$callback
	 * @return Closure
	 */
	 public static function composer($views, $callback){
		return static::$root->composer($views, $callback);
	 }

	/**
	 * Call the composer for a given view.
	 *
	 * @static
	 * @param	\Illuminate\View\View	$view
	 * @return void
	 */
	 public static function callComposer($view){
		 static::$root->callComposer($view);
	 }

	/**
	 * Start injecting content into a section.
	 *
	 * @static
	 * @param	string	$section
	 * @param	string	$content
	 * @return void
	 */
	 public static function startSection($section, $content = ''){
		 static::$root->startSection($section, $content);
	 }

	/**
	 * Inject inline content into a section.
	 *
	 * @static
	 * @param	string	$section
	 * @param	string	$content
	 * @return void
	 */
	 public static function inject($section, $content){
		 static::$root->inject($section, $content);
	 }

	/**
	 * Stop injecting content into a section and return its contents.
	 *
	 * @static
	 * @return string
	 */
	 public static function yieldSection(){
		return static::$root->yieldSection();
	 }

	/**
	 * Stop injecting content into a section.
	 *
	 * @static
	 * @param	bool	$overwrite
	 * @return string
	 */
	 public static function stopSection($overwrite = false){
		return static::$root->stopSection($overwrite);
	 }

	/**
	 * Get the string contents of a section.
	 *
	 * @static
	 * @param	string	$section
	 * @return string
	 */
	 public static function yieldContent($section){
		return static::$root->yieldContent($section);
	 }

	/**
	 * Flush all of the section contents.
	 *
	 * @static
	 * @return void
	 */
	 public static function flushSections(){
		 static::$root->flushSections();
	 }

	/**
	 * Increment the rendering counter.
	 *
	 * @static
	 * @return void
	 */
	 public static function incrementRender(){
		 static::$root->incrementRender();
	 }

	/**
	 * Decrement the rendering counter.
	 *
	 * @static
	 * @return void
	 */
	 public static function decrementRender(){
		 static::$root->decrementRender();
	 }

	/**
	 * Check if there are no active render operations.
	 *
	 * @static
	 * @return bool
	 */
	 public static function doneRendering(){
		return static::$root->doneRendering();
	 }

	/**
	 * Add a location to the array of view locations.
	 *
	 * @static
	 * @param	string	$location
	 * @return void
	 */
	 public static function addLocation($location){
		 static::$root->addLocation($location);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string|array	$hints
	 * @return void
	 */
	 public static function addNamespace($namespace, $hints){
		 static::$root->addNamespace($namespace, $hints);
	 }

	/**
	 * Register a valid view extension and its engine.
	 *
	 * @static
	 * @param	string	$extension
	 * @param	string	$engine
	 * @param	Closure	$resolver
	 * @return void
	 */
	 public static function addExtension($extension, $engine, $resolver = null){
		 static::$root->addExtension($extension, $engine, $resolver);
	 }

	/**
	 * Get the extension to engine bindings.
	 *
	 * @static
	 * @return array
	 */
	 public static function getExtensions(){
		return static::$root->getExtensions();
	 }

	/**
	 * Get the engine resolver instance.
	 *
	 * @static
	 * @return \Illuminate\View\Engines\EngineResolver
	 */
	 public static function getEngineResolver(){
		return static::$root->getEngineResolver();
	 }

	/**
	 * Get the view finder instance.
	 *
	 * @static
	 * @return \Illuminate\View\ViewFinderInterface
	 */
	 public static function getFinder(){
		return static::$root->getFinder();
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return \Illuminate\Events\Dispatcher
	 */
	 public static function getDispatcher(){
		return static::$root->getDispatcher();
	 }

	/**
	 * Get the IoC container instance.
	 *
	 * @static
	 * @return \Illuminate\Container\Container
	 */
	 public static function getContainer(){
		return static::$root->getContainer();
	 }

	/**
	 * Set the IoC container instance.
	 *
	 * @static
	 * @param	\Illuminate\Container\Container	$container
	 * @return void
	 */
	 public static function setContainer($container){
		 static::$root->setContainer($container);
	 }

	/**
	 * Get all of the shared data for the environment.
	 *
	 * @static
	 * @return array
	 */
	 public static function getShared(){
		return static::$root->getShared();
	 }

	/**
	 * Get the entire array of sections.
	 *
	 * @static
	 * @return array
	 */
	 public static function getSections(){
		return static::$root->getSections();
	 }

	/**
	 * Get all of the registered named views in environment.
	 *
	 * @static
	 * @return array
	 */
	 public static function getNames(){
		return static::$root->getNames();
	 }

 }
}

namespace  {
 class Confide extends Zizaco\Confide\ConfideFacade{
	/**
	 * @var \Zizaco\Confide\Confide $root
	 */
	 static private $root;

	/**
	 * Create a new confide instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function __construct(){
		 static::$root->__construct();
	 }

	/**
	 * Returns the Laravel application
	 *
	 * @static
	 * @return Illuminate\Foundation\Application
	 */
	 public static function app(){
		return static::$root->app();
	 }

	/**
	 * Returns the model set in auth config
	 *
	 * @static
	 * @return string
	 */
	 public static function model(){
		return static::$root->model();
	 }

	/**
	 * Get the currently authenticated user or null.
	 *
	 * @static
	 * @return Zizaco\Confide\ConfideUser|null
	 */
	 public static function user(){
		return static::$root->user();
	 }

	/**
	 * Set the user confirmation to true.
	 *
	 * @static
	 * @param	string $code
	 * @return bool
	 */
	 public static function confirm($code){
		return static::$root->confirm($code);
	 }

	/**
	 * Attempt to log a user into the application with
	 * password and identity field(s), usually email or username.
	 *
	 * @static
	 * @param	array $credentials
	 * @param	bool $confirmed_only
	 * @param	mixed $identity_columns
	 * @return void
	 */
	 public static function logAttempt($credentials, $confirmed_only = false, $identity_columns = array()){
		 static::$root->logAttempt($credentials, $confirmed_only, $identity_columns);
	 }

	/**
	 * Checks if the credentials has been throttled by too
	 * much failed login attempts
	 *
	 * @static
	 * @param	array $credentials
	 * @return mixed Value.
	 */
	 public static function isThrottled($credentials){
		return static::$root->isThrottled($credentials);
	 }

	/**
	 * Send email with information about password reset
	 *
	 * @static
	 * @param	string	$email
	 * @return bool
	 */
	 public static function forgotPassword($email){
		return static::$root->forgotPassword($email);
	 }

	/**
	 * Change user password
	 *
	 * @static
	 * @return string
	 */
	 public static function resetPassword($params){
		return static::$root->resetPassword($params);
	 }

	/**
	 * Log the user out of the application.
	 *
	 * @static
	 * @return void
	 */
	 public static function logout(){
		 static::$root->logout();
	 }

	/**
	 * Display the default login view
	 *
	 * @static
	 * @return Illuminate\View\View
	 */
	 public static function makeLoginForm(){
		return static::$root->makeLoginForm();
	 }

	/**
	 * Display the default signup view
	 *
	 * @static
	 * @return Illuminate\View\View
	 */
	 public static function makeSignupForm(){
		return static::$root->makeSignupForm();
	 }

	/**
	 * Display the forget password view
	 *
	 * @static
	 * @return Illuminate\View\View
	 */
	 public static function makeForgotPasswordForm(){
		return static::$root->makeForgotPasswordForm();
	 }

	/**
	 * Display the forget password view
	 *
	 * @static
	 * @return Illuminate\View\View
	 */
	 public static function makeResetPasswordForm($token){
		return static::$root->makeResetPasswordForm($token);
	 }

	/**
	 * Check whether the controller's action exists.
	 * Returns the url if it does. Otherwise false.
	 *
	 * @static
	 * @param	$controllerAction
	 * @return string
	 */
	 public static function checkAction($action, $parameters = array(), $absolute = true){
		return static::$root->checkAction($action, $parameters, $absolute);
	 }

 }
}

namespace  {
 class Entrust extends Zizaco\Entrust\EntrustFacade{
	/**
	 * @var \Zizaco\Entrust\Entrust $root
	 */
	 static private $root;

	/**
	 * Create a new confide instance.
	 *
	 * @static
	 * @param	Illuminate\Foundation\Application	$app
	 * @return void
	 */
	 public static function __construct($app){
		 static::$root->__construct($app);
	 }

	/**
	 * Checks if the current user has a Role by its name
	 *
	 * @static
	 * @param	string $name Role name.
	 * @return boolean
	 */
	 public static function hasRole($permission){
		return static::$root->hasRole($permission);
	 }

	/**
	 * Check if the current user has a permission by its name
	 *
	 * @static
	 * @param	string $permission Permission string.
	 * @return boolean
	 */
	 public static function can($permission){
		return static::$root->can($permission);
	 }

	/**
	 * Get the currently authenticated user or null.
	 *
	 * @static
	 * @return Illuminate\Auth\UserInterface|null
	 */
	 public static function user(){
		return static::$root->user();
	 }

	/**
	 * Filters a route for the name Role. If the third parameter
	 * is null then return 404. Overwise the $result is returned
	 *
	 * @static
	 * @param	string $route	Route pattern. i.e: "admin/*"
	 * @param	array|string $roles	The role(s) needed.
	 * @param	mixed $result i.e: Redirect::to('/')
	 * @param	bool $cumulative Must have all roles.
	 * @return void
	 */
	 public static function routeNeedsRole($route, $roles, $result = null, $cumulative = true){
		 static::$root->routeNeedsRole($route, $roles, $result, $cumulative);
	 }

	/**
	 * Filters a route for the permission. If the third parameter
	 * is null then return 404. Overwise the $result is returned
	 *
	 * @static
	 * @param	string $route	Route pattern. i.e: "admin/*"
	 * @param	array|string $permissions	The permission needed.
	 * @param	mixed	$result i.e: Redirect::to('/')
	 * @param	bool $cumulative Must have all permissions
	 * @return void
	 */
	 public static function routeNeedsPermission($route, $permissions, $result = null, $cumulative = true){
		 static::$root->routeNeedsPermission($route, $permissions, $result, $cumulative);
	 }

 }
}

namespace  {
 class Presenter{
	/**
	 * @var \Robbo\Presenter\Presenter $root
	 */
	 static private $root;

	/**
	 * Create the Presenter and store the object we are presenting.
	 *
	 * @static
	 * @param	mixed $object
	 * @return void
	 */
	 public static function __construct($object){
		 static::$root->__construct($object);
	 }

	/**
	 * Pass any unknown varible calls to present{$variable} or fall through to the injected object.
	 *
	 * @static
	 * @param	string $var
	 * @return mixed
	 */
	 public static function __get($var){
		return static::$root->__get($var);
	 }

	/**
	 * Pass any uknown methods through to the inject object.
	 *
	 * @static
	 * @param	string $method
	 * @param	array	$arguments
	 * @return mixed
	 */
	 public static function __call($method, $arguments){
		return static::$root->__call($method, $arguments);
	 }

 }
}

namespace  {
 class Presentable{
	/**
	 * @var \Robbo\Presenter\PresentableInterface $root
	 */
	 static private $root;

	/**
	 * Return a created presenter.
	 *
	 * @static
	 * @return Robbo\Presenter\Presenter
	 */
	 public static function getPresenter(){
		return static::$root->getPresenter();
	 }

 }
}

namespace  {
 class Basset extends Basset\Facade{
	/**
	 * @var \Basset\Environment $root
	 */
	 static private $root;

	/**
	 * Create a new environment instance.
	 *
	 * @static
	 * @param	Illuminate\Filesystem\Filesystem	$files
	 * @param	Illuminate\Config\Repository	$config
	 * @param	Basset\Factory\Manager	$factory
	 * @param	Basset\AssetFinder	$finder
	 * @return void
	 */
	 public static function __construct($files, $config, $factory, $finder){
		 static::$root->__construct($files, $config, $factory, $finder);
	 }

	/**
	 * Alias of Basset\Environment::collection()
	 *
	 * @static
	 * @param	string	$name
	 * @param	Closure	$callback
	 * @return Basset\Collection
	 */
	 public static function make($name, $callback = null){
		return static::$root->make($name, $callback);
	 }

	/**
	 * Create or return an existing collection.
	 *
	 * @static
	 * @param	string	$name
	 * @param	Closure	$callback
	 * @return Basset\Collection
	 */
	 public static function collection($name, $callback = null){
		return static::$root->collection($name, $callback);
	 }

	/**
	 * Get all collections.
	 *
	 * @static
	 * @return array
	 */
	 public static function getCollections(){
		return static::$root->getCollections();
	 }

	/**
	 * Determine if a collection exists.
	 *
	 * @static
	 * @param	string	$name
	 * @return bool
	 */
	 public static function hasCollection($name){
		return static::$root->hasCollection($name);
	 }

	/**
	 * Register a package with the environment.
	 *
	 * @static
	 * @param	string	$package
	 * @param	string	$namespace
	 * @return void
	 */
	 public static function package($package, $namespace = null){
		 static::$root->package($package, $namespace);
	 }

	/**
	 * Register an array of collections.
	 *
	 * @static
	 * @param	array	$collections
	 * @return void
	 */
	 public static function registerCollections($collections){
		 static::$root->registerCollections($collections);
	 }

	/**
	 * Set a collection offset.
	 *
	 * @static
	 * @param	string	$offset
	 * @param	mixed	$value
	 * @return void
	 */
	 public static function offsetSet($offset, $value){
		 static::$root->offsetSet($offset, $value);
	 }

	/**
	 * Get a collection offset.
	 *
	 * @static
	 * @param	string	$offset
	 * @return Basset\Collection|null
	 */
	 public static function offsetGet($offset){
		return static::$root->offsetGet($offset);
	 }

	/**
	 * Unset a collection offset.
	 *
	 * @static
	 * @param	string	$offset
	 * @return void
	 */
	 public static function offsetUnset($offset){
		 static::$root->offsetUnset($offset);
	 }

	/**
	 * Determine if a collection offset exists.
	 *
	 * @static
	 * @param	string	$offset
	 * @return bool
	 */
	 public static function offsetExists($offset){
		return static::$root->offsetExists($offset);
	 }

	/**
	 * Get the illuminate filesystem instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function getFiles(){
		 static::$root->getFiles();
	 }

	/**
	 * Get the illuminate config repository instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function getConfig(){
		 static::$root->getConfig();
	 }

	/**
	 * Get the factory manager instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function getFactory(){
		 static::$root->getFactory();
	 }

	/**
	 * Get the asset finder instance.
	 *
	 * @static
	 * @return void
	 */
	 public static function getFinder(){
		 static::$root->getFinder();
	 }

 }
}

namespace  {
 class String{
	/**
	 * @var \Andrew13\Helpers\String $root
	 */
	 static private $root;

	/**
	 * Capatilize first letter of each word of a string.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function title($value){
		return static::$root->title($value);
	 }

	/**
	 * 
	 *
	 * @static
	 * @param	$value
	 * @return string
	 */
	 public static function tidy($value){
		return static::$root->tidy($value);
	 }

 }
}

