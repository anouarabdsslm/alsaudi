@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <a class="btn btn-primary" href="{{url('admin/dashboard/stations/add')}}">Add</a>
            <thead >
              <tr>
                <th>Station Depart </th>
                <th>Station Arrive</th>
                <th>Miles</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
                @if(!empty($stations))
                  @foreach ($stations as $key => $station)
                    <tr>
                      <td>{{$station->station_dep}}</td>
                      <td>{{$station->station_arr}}</td>
                      <td>{{$station->miles}}</td>

                      <td>
                        <a class="btn btn-primary" href='{{url("admin/dashboard/stations/$station->id/edit")}}'>Edit</a>
                        

                        {{Form::open(array('url'=>"admin/dashboard/stations/{$station->id}"))}}

                          <input type="submit" class="btn btn-primary" value="Remove"/>

                        {{Form::close()}}
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td>No tations yet</td>
                  </tr>
                @endif
            </tbody>

          </table>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop