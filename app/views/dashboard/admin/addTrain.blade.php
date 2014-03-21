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
              <input value="{{Input::old('train_name')}}" type="text" class="form-control" placeholder="Train Name" name="train_name">
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