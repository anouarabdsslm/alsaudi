@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <a class="btn btn-primary" href="{{url('admin/dashboard/trips/add')}}">Add</a>
            <thead >
              <tr>
                <th>From</th>
                <th>To</th>
                <th>Depart</th>
                <th>Arrive</th>
                <th>Connection</th>
                <th>duration</th>
                <th>train</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
                @if(!empty($trips))
                  @foreach ($trips as $key => $trip)
                  @foreach ($trip->stations as $key => $station)
                    <tr>
                      <td>{{$station->station_dep}}</td>
                      <td>{{$station->station_arr}}</td>
                      <td>{{$trip->depart}}</td>
                      <td>{{$trip->arrive}}</td>
                      <td>{{$trip->connection}}</td>
                      <td>{{$trip->duration}}</td>
                      <td>{{$trip->train->train_name}}</td>

                      <td>
                        <a class="btn btn-primary" href='{{url("admin/dashboard/trips/$trip->id/edit")}}'>Edit</a>

                        {{Form::open(array('url'=>"admin/dashboard/trips/{$trip->id}"))}}
                          {{Form::hidden('stationId',$station->id)}}
                          <input type="submit" class="btn btn-primary" value="Remove"/>

                        {{Form::close()}}
                      </td>
                    </tr>
                    @endforeach
                    @endforeach
                @else
                  <tr>
                    <td>No trips yet</td>
                  </tr>
                @endif
            </tbody>

          </table>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop