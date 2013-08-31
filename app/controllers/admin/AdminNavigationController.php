<?php

class AdminNavigationController extends AdminController {

	/**
	 * Navigation Repository
	 *
	 * @var Navigation
	 */
	protected $navigation;

    protected $navigationGroup;

	public function __construct(Navigation $navigation, NavigationGroup $navigationGroup)
	{
		parent::__construct();
		$this->navigation = $navigation;
        $this->navigationGroup = $navigationGroup;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$title = Lang::get('admin/navigation/title.navigation_management');
		$navigations = $this->navigation->all();

		return View::make('admin/navigation/index', compact('title','navigations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$title = Lang::get('admin/navigation/title.create_a_new_navigation');
        
        $navigations = Navigation::all();
        $pageList = Page::lists('name', 'id');
        $navigationGroupList = NavigationGroup::lists('title', 'id');

        // Show the navigation group
		return View::make('admin/navigation/create_edit', compact('title', 'navigations', 'pageList', 'navigationGroupList'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'link_type' => 'required',
            'target' => 'required',
            'url' => 'url'
        );
        if($link_type = Input::get('link_type'))
        {
            $link_field = ($link_type == 'page') ? 'page_id' : $link_type;
            $rules[$link_field] = 'required';
        }

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new navigation
            $this->navigation->title = Input::get( 'title' );
            $this->navigation->link_type = Input::get( 'link_type' );
            $this->navigation->parent = Input::get( 'parent' );
            $this->navigation->page_id = Input::get( 'page_id' );
            $this->navigation->url = Input::get( 'url' );
            $this->navigation->uri = Input::get( 'uri' );
            $this->navigation->navigation_group_id = Input::get( 'navigation_group_id' );
            $this->navigation->target = Input::get( 'target' );
            $this->navigation->class = Input::get( 'class' );

            $this->navigation->save();
            
            if ( $this->navigation->id )
            {
                // Redirect to the new navigation
                return Redirect::to('admin/navigation/' . $this->navigation->id . '/edit')->with('success', Lang::get('admin/navigation/messages.create.success'));
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->navigation->errors()->all();

                return Redirect::to('admin/navigation/create')
                    ->with( 'error', $error );
            }
        }

        // Form validation failed
        return Redirect::to('admin/navigation/create')->withInput()->withErrors($validator);
	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function getEdit($id)
    {

        $navigations = Navigation::all();
        $pageList = Page::lists('name', 'id');
        $navigationGroupList = NavigationGroup::lists('title', 'id');

        if ( $id )
        {
        	$navigation = Navigation::find($id);
            // Title
            $title = Lang::get('admin/navigation/title.navigation_group_update');
            // mode
            $mode = 'edit';

            return View::make('admin/navigation/create_edit', compact('navigation', 'title', 'mode', 'pageList', 'navigationGroupList'));
        }
        else
        {
            return Redirect::to('admin/navigation')->with('error', Lang::get('admin/navigation/messages.does_not_exist'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $navigation
     * @return Response
     */
    public function postEdit($id)
    {
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'link_type' => 'required',
            'target' => 'required'
        );
        if($link_type = Input::get('link_type'))
        {
            $link_field = ($link_type == 'page') ? 'page_id' : $link_type;
            $url = ($link_type == 'url') ? '|url' : '';
            $rules[$link_field] = 'required'.$url;
        }

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        $navigation = Navigation::find($id);

        $inputs = Input::all();

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Was the page updated?
            if ($navigation->update($inputs))
            {
                // Redirect to the navigation navigation
                return Redirect::to('admin/navigation/' . $navigation->id . '/edit')->with('success', Lang::get('admin/navigation/messages.update.success'));
            }
            else
            {
                // Redirect to the navigation navigation
                return Redirect::to('admin/navigation/' . $navigation->id . '/edit')->with('error', Lang::get('admin/navigation/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/navigation/' . $navigation->id . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param $role
     * @internal param $id
     * @return Response
     */
    public function getDelete($id)
    {
        $navigation = Navigation::find($id);
            // Was the role deleted?
            if($navigation->delete()) {
                // Redirect to the role management page
                return Redirect::to('admin/navigation')->with('success', Lang::get('admin/navigation/messages.delete.success'));
            }

            // There was a problem deleting the role
            return Redirect::to('admin/navigation')->with('error', Lang::get('admin/navigation/messages.delete.error'));
    }


	/**
     * Show a list of all the pages formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $navs = Navigation::leftjoin('navigation_groups', 'navigation_groups.id', '=', 'navigation_links.navigation_group_id')
                    ->select(array('navigation_links.id',  'navigation_links.title', 'navigation_links.link_type', 'navigation_groups.title as navigtion_group'));

        return Datatables::of($navs)

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/navigation/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-warning btn-sm">{{{ Lang::get(\'button.edit\') }}}</a>
                               <a href="{{{ URL::to(\'admin/navigation/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                               
            ')

        ->remove_column('id')

        ->make();
    }

}