<?php

class ApiController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    protected function callMethod($method, $parameters)
    {
        try
        {
            return parent::callMethod($method, $parameters);
        }
        catch (\ValidationException $e)
        {
            $error = $e->getMessage();

            $response = Response::make($error, 400);

            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
    }

}