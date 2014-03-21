<?php

class AdminController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{

        $user = Auth::user();

        if(!empty($user->id)){

        	if(Auth::user()->is_admin === 1)  
        		
        		return View::make('dashboard.admin.index',compact('user'));
        	else
            	return Redirect::to('/');
        		          
        }

		return Redirect::to('/');
	}


    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
       $user = Auth::user();
        if(! empty($user->id)){
            return Redirect::to('dashboard.admin.index');
        }

        return View::make('dashboard.admin.login');
    }

    /**
     * Logout
     *
     */
    public function getLogout()
    {
       $user = Auth::user();
        if(!empty($user->id)){
            Auth::logout();
        }
        return Redirect::to('/');

    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {

        $input = array(
            'email' => Input::get( 'email' ),
            'password' => Input::get( 'password' ),
        );

        $rules =  array(
            'email'=>'required',
			'password'=>'required',
        );

        $v = Validator::make($input,$rules);

        if($v->fails()){
        	Input::flash();
        	return Redirect::back()->with('errors',$v->messages()->all());
        } 
        if (Auth::attempt($input)) {

        	if(Auth::user()->is_admin === 1)  
        		return View::make('dashboard.admin.index');
        	else
            	return Redirect::to('dashboard.user');
        }

        return Redirect::to('admin/login');

    }

}