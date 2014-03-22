@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      {{Form::open(array('url' => "dashboard/user/{$user->id}/edit",'files'=>true))}}
      <span>
          @if(! empty($errors))
          <ul>
            @foreach( $errors as $message )
              <li>{{ $message }}</li>
            @endforeach
          </ul>
          @endif
      </span>
      @if(! empty($user))
        <div class="col-md-4">
            <div class="form-group">
              <span>User Name :</span>
              <input value="{{$user->user_name}}" type="text" class="form-control" placeholder="Username" name="user_name">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <span>First Name :</span>
              <input value="{{$user->first_name}}" type="text" class="form-control" placeholder="First Name" name="first_name">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <span>Last Name :</span>
              <input value="{{$user->last_name}}" type="text" class="form-control" placeholder="Last Name" name="last_name">
            </div>  <!-- / .form-group -->
            <div class="form-group">
              <span>Email :</span>
              <input value="{{$user->email}}" type="email" class="form-control" placeholder="E-mail" name="email">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <span>Profile Image :</span>
              <input type="file" class="form-control"  name="profile_image">
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