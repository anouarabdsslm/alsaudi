@extends('layouts.master')

@section('title','Schedule - Al Saoudi')
@section('id','profile')

@section('content')
<div class="head">
  <div class="container">
    <div class="row">
      <div class="col-md-push-2 col-md-3">
        <img src="{{asset('assets/img/user.png')}}" alt="" class="img-circle">
      </div>
      <!-- /.col-md-12 -->
      <div class="col-md-push-2 col-md-4">
        <p>
          @if(! empty($userDetais))
          {{$userDetais->first_name}} {{$userDetais->last_name}} <br>
          @else
            {{$user->first_name}} {{$user->last_name}} <br>
          @endif
           Mecca - Saudi Araiba
        </p>
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>

<div class="features">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="feature">
      	<?php $accumulatedMiles = 0; ?>
          <h4>RECENT/CURRENT TRIPS</h4>
            @if(! empty($userDetais->trips))
            	@foreach ($userDetais->trips as $trip) 
    	          @foreach ($trip->stations as $station)
    	           <p>
    	           	{{$station->station_dep}} - {{$station->station_arr}} - {{$trip->depart}}
    	           </p>
    	           <?php $accumulatedMiles+=$station->miles;?>
    	           @endforeach
            	@endforeach
            @else
              <p>You have no trips yet</p>
            @endif
          <a href=# class="btn btn-primary">More info</a>
        </div>
        <!-- feature -->
      </div>
      <!-- /.col-md-4-->
      <div class="col-md-4">
        <div class="feature">
          <h4>ACCUMULATED MILES</h4>
          <h1 class="text-center"> {{$accumulatedMiles}} Mi</h1>
          <a href=# class="btn btn-primary">More info</a>
        </div>
        <!-- feature -->
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <div class="feature">
          <h4>PERSONAL INFO</h4>
          @if(! empty($$userDetais->creditCard))
            <p>
               Credit card : {{$userDetais->creditCard->card_number}}
            </p>
            <p>
               Expires: {{$userDetais->creditCard->date_exp->day}} /
               		  {{$userDetais->creditCard->date_exp->month}} /
               		  {{$userDetais->creditCard->date_exp->year}}
            </p>
            <a href=# class="btn btn-primary">More info</a>
          @else
            <p>No credit card data set yet</p>
          @endif
        </div>
        <!-- feature -->
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.row -->
</div>

@stop