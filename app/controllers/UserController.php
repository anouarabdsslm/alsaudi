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

        $destinationPath = '';
        $filename        = '';
        $path            = '';


        if (Input::hasFile('profile_image'))
        {
                $file            = Input::file('profile_image');

                $destinationPath = public_path().'/assets/img/';

                $filename        = str_random(6) . '_' . $file->getClientOriginalName();

                $uploadSuccess   = $file->move($destinationPath, $filename);


                if($uploadSuccess) $data['path'] = $filename;
                
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
            return Redirect::to('dashboard/user');
        }

        return View::make('account.login');
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

    public function getEdit($id) {

        $user = User::find($id);

        return View::make("dashboard.userEdit", compact('user'));
    }

    public function postEdit($id) {

        $user = User::find($id);

        $data =array(
            'user_name'=>Input::get('user_name'),
            'first_name'=>Input::get('first_name'),
            'last_name'=>Input::get('last_name'),
            'email'=>Input::get('email'),
        );

        $rules =array(
            'user_name'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }
        
        $destinationPath = '';
        $filename        = '';
        $path            = '';


        if (Input::hasFile('profile_image'))
        {
                $file            = Input::file('profile_image');

                $destinationPath = public_path().'/assets/img/';

                $filename        = str_random(6) . '_' . $file->getClientOriginalName();

                $uploadSuccess   = $file->move($destinationPath, $filename);


                if($uploadSuccess) $path = $filename;
                
        }

        $user->user_name = Input::get('user_name');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->path = $path;

        if ($user->save()) {
            return Redirect::to("dashboard/user");
        }
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

            return Redirect::to('dashboard/user');
        }

        return Redirect::to('account/login');

    }

    public function getDashboard(){

            $user = Auth::user();
            if(Auth::check()) {

                //recent curent trips for user

                //miles traveled by user

                //credit card detais


                $userDetais = User::whereId($user->id)->with('creditcard','trips')->whereHas('trips',function($q){
                    $q->orderBy('created_at');
                })->first();
               
               if(empty($userDetais)){
                    $userDetais =$user;
               }
                return View::make("dashboard.user",compact('userDetais'));
            }

            return Redirect::to('/');

    }

    public function getAdminUsers(){

        $users = User::all();
        return View::make("dashboard.admin.users", compact('users'));
    }

    public function getAdminEdit($id) {

        $user = User::find($id);

        return View::make("dashboard.admin.userEdit", compact('user'));
    }

    public function getAdminAdd() {

        return View::make("dashboard.admin.addUser");
    }

    public function postAdminAdd() {

        $data =array(
            'user_name'=>Input::get('user_name'),
            'first_name'=>Input::get('first_name'),
            'last_name'=>Input::get('last_name'),
            'email'=>Input::get('email'),
            'password'=>Hash::make(Input::get('password')),
            'is_admin'=>Input::get('role'),
        );


        $rules =array(
            'user_name'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'is_admin'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        $destinationPath = '';
        $filename        = '';
        $path            = '';


        if (Input::hasFile('profile_image'))
        {
                $file            = Input::file('profile_image');

                $destinationPath = public_path().'/assets/img/';

                $filename        = str_random(6) . '_' . $file->getClientOriginalName();

                $uploadSuccess   = $file->move($destinationPath, $filename);


                if($uploadSuccess) $data['path'] = $filename;
                
        }

        if (User::create($data)) {
            return Redirect::to('admin/dashboard/users');
        }
    }


    public function postAdminEdit($id) {

        $user = User::find($id);

        $data =array(
            'user_name'=>Input::get('user_name'),
            'first_name'=>Input::get('first_name'),
            'last_name'=>Input::get('last_name'),
            'email'=>Input::get('email'),
        );

        $rules =array(
            'user_name'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        $destinationPath = '';
        $filename        = '';
        $path            = '';


        if (Input::hasFile('profile_image'))
        {
                $file            = Input::file('profile_image');

                $destinationPath = public_path().'/assets/img/';

                $filename        = str_random(6) . '_' . $file->getClientOriginalName();

                $uploadSuccess   = $file->move($destinationPath, $filename);


                if($uploadSuccess) $path = $filename;
                
        }

        $user->user_name = Input::get('user_name');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->path = $path;
        if ($user->save()) {
            return Redirect::to("admin/dashboard/users");
        }
    }

    public function postDelete($id) {

        $user = User::find($id);

        if(! empty($user)) $user->delete();

        return Redirect::to('admin/dashboard/users');
    }
}