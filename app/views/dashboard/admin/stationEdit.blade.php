@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url' => "admin/dashboard/stations/{$station->id}/edit"))}}
      <span>
          @if(! empty($errors))
          <ul>
            @foreach( $errors as $message )
              <li>{{ $message }}</li>
            @endforeach
          </ul>
          @endif
      </span>
      @if(! empty($station))
        <div class="col-md-4">
            <div class="form-group">
              <input value="{{$station->station_dep}}" type="text" class="form-control" placeholder="Station depart" name="station_dep">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input value="{{$station->station_arr}}" type="text" class="form-control" placeholder="Station Arrive" name="station_arr">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input value="{{$station->miles}}" type="text" class="form-control" placeholder="Miles" name="miles">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Save"/>
            </div>  <!-- / .form-group -->
        </div> <!-- /.col-md-4 -->
        @endif
      {{Form::close()}}
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop