<?php

class EloquentUserRepository implements UserRepositoryInterface {

	public function findById($id)
    {
        $user = User::where('id', $id)->first();

        if(!$user) throw new NotFoundException('Post Not Found');

        return $user;
    }

    public function store($data)
    {
        // Read the form information from the POST request
        $this->user->username = $data['username'];
        $this->user->email = $data['email'];
        $this->user->password = $data['password'];

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $this->user->password_confirmation = $data['username'];
        $this->user->confirmed = $data['confirm'];

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ( $this->user->id )
        {
            // Save roles. Handles updating.
            $this->user->saveRoles(Input::get( 'roles' ));

            // Redirect to the new user page
            return Redirect::to('admin/users/' . $this->user->id . '/edit')
                ->with('success', Lang::get('admin/users/messages.create.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            return Redirect::to('admin/users/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }
}