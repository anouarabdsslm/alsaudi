@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url' => "admin/dashboard/trips/{$trip->id}/edit"))}}
      <span>
          @if(! empty($errors))
          <ul>
            @foreach( $errors as $message )
              <li>{{ $message }}</li>
            @endforeach
          </ul>
          @endif
      </span>
      @if(! empty($trip))
        <div class="col-md-4">
            <div class="form-group">
              <span>Depart :</span>
              <input value="{{$trip->depart}}" type="text" class="form-control" placeholder="Depart" name="depart">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <span>Arrive :</span>
              <input value="{{$trip->arrive}}" type="text" class="form-control" placeholder="Arrive" name="arrive">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <span>Connection :</span>
              <input value="{{$trip->connection}}" type="text" class="form-control" placeholder="connection" name="connection">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <select name="station_id">

                @foreach ($stations as $station)
                  <option value="{{$station->id}}">
                    From {{$station->station_dep}} To {{$station->station_arr}}
                  </option>

                @endforeach
              </select>
            </div>  <!-- / .form-group -->
            
            <div class="form-group">
              <select name="train_id">
              		<option value="{{$trip->train->id}}">
              			{{$trip->train->train_name}}
              		</option>

              </select>
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