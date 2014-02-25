@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url' => 'account'))}}
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
              <input value="{{Input::old('user_name')}}" type="text" class="form-control" placeholder="Username" name="user_name">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input value="{{Input::old('first_name')}}" type="text" class="form-control" placeholder="First Name" name="first_name">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input value="{{Input::old('last_name')}}" type="text" class="form-control" placeholder="Last Name" name="last_name">
            </div>  <!-- / .form-group -->
            <div class="form-group">
              <input value="{{Input::old('email')}}" type="email" class="form-control" placeholder="E-mail" name="email">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>  <!-- / .form-group -->
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirm Password" name="cfpassword">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Create Account"/>
            </div>  <!-- / .form-group -->
        </div> <!-- /.col-md-4 -->
      {{Form::close()}}
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop