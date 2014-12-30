<?php

class APIController extends BaseController {

    /**
     * Initializer.
     *
     * @return \APIController
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Transform ng-admin request into Laravel Api Handler
     * @param $table_name
     * @return array
     */
    public function passParams($table_name){
        //Print out all table's columns
        $columns = Schema::getColumnListing($table_name);
        $params = [
            '_limit'    => 10,
            '_offset'   => 0,
        ];
        // If have _sort is a valid column
        if (in_array(Input::get('_sort'), $columns))
        {
            // Default sortDir is ASC
            $sortDir = (!empty(Input::get('_sortDir'))) ? Input::get('_sortDir') : 'ASC';
            // ASC --> null   DESC --> -
            $sort = ($sortDir === 'ASC' ) ? '' : '-';
            $sort .= Input::get('_sort');
            $params ['_sort'] = $sort;
        }
        if (!empty(Input::get('page')) && !empty(Input::get('per_page')))
        {
            $params['_limit'] = Input::get('per_page');
            $params['_offset'] = (Input::get('page') - 1)*Input::get('per_page');
        }
        if (!empty(Input::get('q')) && Input::get('q') != '{}')
        {
            $query = json_decode(Input::get('q'));
            $params['_q'] = $query->query;
        }

        foreach ($columns as $column)
        {
            // Use strlen == 0 instead of !empty to prevent boolean filter broken
            if (strlen(Input::get($column)) != 0)
            {
                $params[$column] = Input::get($column);
            }
        }
        // Return number of total rows in query (for pagination)
        $params ['_config'] = 'meta-filter-count';
        return $params;
    }

    /**
     * Make a quick response with pagination supported
     * @param $response
     * @param $statusCode
     * @param $builder
     * @return mixed
     */
    public function makeResponse($response,$statusCode, $builder){
        return Response::json($response,$statusCode)->header('X-Total-Count', $builder->getHeaders()['Meta-Filter-Count']);
    }

    /* Testing purpose
    public function returnIndex($eloquentModel, $fulltext = [], $table_name){
        try{
            $statusCode = 200;
            $builder = ApiHandler::parseMultiple($eloquentModel, $fulltext = [], $this->passParams($table_name));
            $users = $builder->getResult();
            $response = [];

            foreach($users as $user){
                $response[] = $this->responseMap($user);
            }

            return Response::json($response,$statusCode)->header('X-Total-Count', $builder->getHeaders()['Meta-Filter-Count']);
        } catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
    }*/
}