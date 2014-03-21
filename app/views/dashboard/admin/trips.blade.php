@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead >
              <tr>
                <th> First Name </th>
                <th>Last Name</th>
                <th>User name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
                @if(!empty($trips))
                  @foreach ($trips as $key => $user)
                    <tr>
                      <td>{{$user->first_name}}</td>
                      <td>{{$user->last_name}}</td>
                      <td>{{$user->user_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                          @if($user->is_admin === 1 )
                            <span>Admin</span>
                          @else
                            <span>Normale user</span>
                          @endif
                        </td>
                      <td>
                        <a href="{{url('admin/dashboard/stations')}}">Edit</a>
                        <a href="{{url('admin/dashboard/stations')}}">Add</a>
                        <a href="{{url('admin/dashboard/stations')}}">Remove</a>
                      </td>
                    </tr>
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