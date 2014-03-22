@extends('layouts.master')

@section('title','Schedule - Al Saoudi')
@section('id','profile')

@section('content')

<div class="features">
  <div class="container">

      <div class="col-md-4">
          <a href="{{url('admin/dashboard/users')}}" class="btn btn-primary">Manage Users</a>
        <!-- feature -->
      </div>
      
      <div class="col-md-4">
          <a href="{{url('admin/dashboard/stations')}}" class="btn btn-primary">Manage Stations</a>
        <!-- feature -->
      </div>
      
      <div class="col-md-4">
          <a href="{{url('admin/dashboard/trains')}}" class="btn btn-primary">Manage Trains</a>
        <!-- feature -->
      </div>

      <div class="col-md-4" style="margin-top:10px">
          <a href="{{url('admin/dashboard/trips')}}" class="btn btn-primary">Manage Trips</a>
        <!-- feature -->
      </div>
      
      
     <!-- <div class="col-md-4" style="margin-top:10px">
          <a href="{{url('admin/dashboard/tickets')}}" class="btn btn-primary">Manage Ticket</a>
        <!-- feature --
      </div>-->
  </div>
  <!-- /.row -->
</div>

@stops