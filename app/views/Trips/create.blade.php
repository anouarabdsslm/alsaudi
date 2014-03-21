@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url' => "admin/dashboard/trains"))}}
      <span>
          @if(! empty($errors))
          <ul>
            @foreach( $errors as $message )
              <li>{{ $message }}</li>
            @endforeach
          </ul>
          @endif
      </span>
        <div class="col-md-4">
            
            <div class="form-group">
              <input value="{{Input::old('depart')}}" type="text" class="form-control" placeholder="Depart" name="depart">
            </div>  <!-- / .form-group -->
            
            <div class="form-group">
              <input value="{{Input::old('arrive')}}" type="text" class="form-control" placeholder="Arrive" name="arrive">
            </div>  <!-- / .form-group -->
            
            <div class="form-group">
              <input value="{{Input::old('connection')}}" type="text" class="form-control" placeholder="Connection" name="connection">
            </div>  <!-- / .form-group -->
            
            <div class="form-group">
              <input value="{{Input::old('duration')}}" type="text" class="form-control" placeholder="Duration" name="duration">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <select name="train_id">

              	@foreach ($trains as $train)
              		{{$train->train_name}}
              		<option value="{{$train->id}}">
              			{{$train->train_name}}
              		</option>

              	@endforeach
              </select>
            </div>  <!-- / .form-group -->

            </div>  <!-- / .form-group -->
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Add"/>
            </div>  <!-- / .form-group -->
        </div> <!-- /.col-md-4 -->

        </div> <!-- /.col-md-4 -->
      {{Form::close()}}
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop