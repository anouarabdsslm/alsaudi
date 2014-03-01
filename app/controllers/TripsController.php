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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('trips.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
