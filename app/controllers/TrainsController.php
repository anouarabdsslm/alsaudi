<?php

class TrainsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('trains.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('trains.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('trains.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('trains.edit');
	}

	public function getAdminTrains(){

        $trains = Train::all();
        return View::make("dashboard.admin.trains", compact('trains'));
    }

    public function getAdminEdit($id) {

        $train = Train::find($id);

        return View::make("dashboard.admin.trainEdit", compact('train'));
    }

    public function getAdminAdd() {

        return View::make("dashboard.admin.addTrain");
    }

    public function postAdminAdd() {

        $data =array(
            'train_name'=>Input::get('train_name'),
        );

        $rules =array(
            'train_name'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        if (Train::create($data)) {
            return Redirect::to('admin/dashboard/trains');
        }
    }


    public function postAdminEdit($id) {

        $train = Train::find($id);

        $data =array(
            'train_name'=>Input::get('train_name'),
        );

        $rules =array(
            'train_name'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        $train->train_name = Input::get('train_name');

        if ($train->save()) {
            return Redirect::to("admin/dashboard/trains");
        }
    }

    public function postDelete($id) {

        $train = Train::find($id);

        if(! empty($train)) $train->delete();

        return Redirect::to('admin/dashboard/trains');
    }

}
