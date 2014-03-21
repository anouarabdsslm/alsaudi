<?php

class StationsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('stations.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('stations.create');
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
        return View::make('stations.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('stations.edit');
	}

  	public function getAdminStations(){

        $stations = Station::all();
        return View::make("dashboard.admin.stations", compact('stations'));
    }

    public function getAdminEdit($id) {

        $station = Station::find($id);

        return View::make("dashboard.admin.stationEdit", compact('station'));
    }

    public function getAdminAdd() {

        return View::make("dashboard.admin.addStation");
    }

    public function postAdminAdd() {

        $data =array(
            'station_dep'=>Input::get('station_dep'),
            'station_arr'=>Input::get('station_arr'),
            'miles'=>Input::get('miles'),
        );

        $rules =array(
            'station_dep'=>'required',
            'station_arr'=>'required',
            'miles'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        if (Station::create($data)) {
            return Redirect::to('admin/dashboard/stations');
        }
    }


    public function postAdminEdit($id) {

        $station = Station::find($id);

        $data =array(
            'station_dep'=>Input::get('station_dep'),
            'station_arr'=>Input::get('station_arr'),
            'miles'=>Input::get('miles'),
        );

        $rules =array(
            'station_dep'=>'required',
            'station_arr'=>'required',
            'miles'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        $station->station_dep = Input::get('station_dep');
        $station->station_arr = Input::get('station_arr');
        $station->miles = Input::get('miles');
        if ($station->save()) {
            return Redirect::to("admin/dashboard/stations");
        }
    }

    public function postDelete($id) {

        $station = Station::find($id);

        if(! empty($station)) $station->delete();

        return Redirect::to('admin/dashboard/stations');
    }

}
