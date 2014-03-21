<?php

class TripsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('trips.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('trips.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$from =Input::get('from');
		$to =Input::get('to');
		$dateToCheck = Input::get('date');

		$fields = array(
				'station_dep'=>$from,
				'station_arr'=>$to,
				'dapart'=>$dateToCheck,
			);
		$rules = array(
				'station_dep'=>'required',
				'station_arr'=>'required',
				'dapart'=>'required',
			);

		$validation = Validator::make($fields, $rules);
		
		if ($validation->fails()) {
			Input::flash();
			return Redirect::back()->with('errors', $validation->messages()->all());
		}

		$date = explode( '-',$dateToCheck);

		$dt = \Carbon\Carbon::create($date[0], $date[1], $date[2]);
		
		
		$trips = Trip::with('train')->whereHas('stations',function($q){
			$q->where('station_dep', '=', Input::get('from'));
			$q->where('station_arr', '=', Input::get('to'));
		})->get();

        return View::make('trips.index',compact('trips'))
        		->with('from',$from)
        		->with('to',$to)
        		->with('dt',$dt);
	}

	public function getAdminTrips(){

        $trips = Trip::all();
        return View::make("trips.trains", compact('trips'));
    }

    public function getAdminEdit($id) {

        $trip = Trip::find($id);

        return View::make("trips.edit", compact('trip'));
    }

    public function getAdminAdd() {

    	$trains = Train::all();
        return View::make("trips.create",compact('trains'));
    }

    public function postAdminAdd() {

        $data =array(
            'depart'=>Input::get('depart'),
            'arrive'=>Input::get('arrive'),
            'connection'=>Input::get('connection'),
            'duration'=>Input::get('duration'),
            'train_id'=>Input::get('train_id'),
        );

        $rules =array(
            'depart'=>'required',
            'arrive'=>'required',
            'connection'=>'required',
            'duration'=>'required',
            'train_id'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        if (Trip::create($data)) {
            return Redirect::to('admin/dashboard/trips');
        }
    }


    public function postAdminEdit($id) {

        $trip = Trip::find($id);

        $data =array(
            'depart'=>Input::get('depart'),
            'arrive'=>Input::get('arrive'),
            'connection'=>Input::get('connection'),
            'duration'=>Input::get('duration'),
            'train_id'=>Input::get('train_id'),
        );

        $rules =array(
            'depart'=>'required',
            'arrive'=>'required',
            'connection'=>'required',
            'duration'=>'required',
            'train_id'=>'required',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            Input::flash();
            return Redirect::back()->withInput()->with('errors', $validator->messages()->all());
        }

        $trip->depart = Input::get('depart');
        $trip->arrive = Input::get('arrive');
        $trip->connection = Input::get('connection');
        $trip->duration = Input::get('duration');
        $trip->train_id = Input::get('train_id');

        if ($trip->save()) {
            return Redirect::to("admin/dashboard/trips");
        }
    }

    public function postDelete($id) {

        $trip = Trip::find($id);

        if(! empty($trip)) $trip->delete();

        return Redirect::to('admin/dashboard/trips');
    }

}
