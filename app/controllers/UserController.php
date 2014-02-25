<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
        $user = Auth::user();
        if(!empty($user->id)){
            return View::make('dashboard.user',compact('user'));
        }
		return View::make('account.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postNew()
	{

		$data =array(
			'user_name'=>Input::get('user_name'),
			'first_name'=>Input::get('first_name'),
			'last_name'=>Input::get('last_name'),
			'email'=>Input::get('email'),
			'password'=>Hash::make(Input::get('password')),
		);

		$rules =array(
			'user_name'=>'required|unique:users',
			'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'required',
			'password'=>'required',
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			Input::flash();
			return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
		}

		if (User::create($data)) {
            return Redirect::to('account/login');
        }

	}

    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
       $user = Auth::user();
        if(!empty($user->id)){
            return View::make('dashboard.user',compact('user'));
        }

        return View::make('account.login');
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

            $user = Auth::user();
            return View::make('dashboard.user',compact('user'));
        }

        return Redirect::to('account/login');

    }

}