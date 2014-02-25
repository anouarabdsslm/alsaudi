@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url'=>'account/login'))}}
        <div class="col-md-4">
          @if(! empty($errors))
          <ul>
            @foreach( $errors as $message )
              <li>{{ $message }}</li>
            @endforeach
          </ul>
          @endif

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email" name="email">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>  <!-- / .form-group -->
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Login"/>
            </div>  <!-- / .form-group -->
        </div> <!-- /.col-md-4 -->
      {{Form::close()}}
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop