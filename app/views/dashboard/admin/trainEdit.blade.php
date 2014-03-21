@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        {{Form::open(array('url' => "admin/dashboard/trains/{$train->id}/edit"))}}
        <span>
            @if(! empty($errors))
            <ul>
              @foreach( $errors as $message )
                <li>{{ $message }}</li>
              @endforeach
            </ul>
            @endif
        </span>
        @if(! empty($train))
          <div class="col-md-4">
              <span>Train Name :</span>
              <div class="form-group">
                <input value="{{$train->train_name}}" type="text" class="form-control" placeholder="train name" name="train_name">
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