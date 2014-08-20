<?php

use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseControllerTestCase extends TestCase
{

    /**
     * Will contain the parameters of the next request
     *
     * @var array
     */
    protected $requestInput = array();

    /**
     * Will the last HttpException caught
     *
     * @var HttpException
     */
    protected $lastException;

    /**
     * Set session and enable Laravel filters
     *
     */
    public function setUp()
    {
        parent::setUp();

        // Enable session
        Session::start();

        // Enable filters
        Route::enableFilters();
    }

    /**
     * Request an URL by the action name
     *
     * @param string $method
     * @param string $action
     * @param array $params
     * @return BaseControllerTestCase this for method chaining.
     */
    public function requestAction($method, $action, $params = array())
    {
        $action_url = URL::action($action, $params);

        if ($action_url == '')
            trigger_error("Action '$action' does not exist");

        try {
            // The following method returns Synfony's DomCrawler
            // but it will not be used when testing controllers
            $this->client->request($method, $action_url, array_merge($params, $this->requestInput));
        } catch (HttpException $e) {
            // Store the HttpException in order to check it later
            $this->lastException = $e;
        }

        return $this; // for method chaining
    }

    /**
     * Set the post parameters and return this for chainable
     * method call
     *
     * @param array $params Post paratemers array.
     * @return mixed this.
     */
    public function withInput($params)
    {
        $this->requestInput = $params;

        return $this;
    }

    /**
     * Asserts if the status code is correct
     *
     * @param $code Correct status code
     * @return void
     */
    public function assertStatusCode($code)
    {
        if ($this->lastException) {
            $realCode = $this->lastException->getStatusCode();
        } else {
            $realCode = $this->client->getResponse()->getStatusCode();
        }

        $this->assertEquals($code, $realCode, "Response was not $code, status code was $realCode");
    }

    /**
     * Asserts if the request was Ok (200)
     *
     * @return void
     */
    public function assertRequestOk()
    {
        $this->assertStatusCode(200);
    }

    /**
     * Asserts if page was redirected correctly
     *
     * @param $location Location where it should be redirected
     * @return void
     */
    public function assertRedirection($location = null)
    {
        $response = $this->client->getResponse();

        if ($this->lastException) {
            $statusCode = $this->lastException->getStatusCode();
        } else {
            $statusCode = $response->getStatusCode();
        }

        $isRedirection = in_array($statusCode, array(201, 301, 302, 303, 307, 308));

        $this->assertTrue($isRedirection, "Last request was not a redirection. Status code was " . $statusCode);

        if ($location) {
            if (!strpos($location, '://'))
                $location = 'http://:' . $location;

            $this->assertEquals($this->cleanTrailingSlash($location), $this->cleanTrailingSlash($response->headers->get('Location')), 'Page was not redirected to the correct place');
        }

    }

    /**
     * Asserts if the session variable is correct
     *
     * @param string $name  Session variable name.
     * @param mixed $value Session variable value.
     * @return void.
     */
    public function assertSessionHas($name, $value = null)
    {
        $this->assertTrue(Session::has($name), "Session doesn't contain '$name'");

        if ($value) {
            $this->assertContains($value, Session::get($name), "Session '$name' are not equal to $value");
        }
    }

    public function assertEqualsUrlPath($url, $value = null)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $pathWithoutSlash = substr($path, 1);
        $this->assertEquals($pathWithoutSlash, $value);
    }

    public function cleanTrailingSlash($string)
    {
        if (substr($string, -1) == '/') {
            $string = substr($string, 0, -1);
        }

        return $string;
    }
}