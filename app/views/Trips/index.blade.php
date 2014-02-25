@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">

      {{Form::open(array('route'=>'trips.store'))}}
        <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="From" name="from">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="text" class="form-control" placeholder="to" name="to">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Date" name="date">
            </div>  <!-- / .form-group -->

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Find Schedule"/>
            </div>  <!-- / .form-group -->
        </div> <!-- /.col-md-4 -->
      {{Form::close()}}


      @if(!empty($trips))

        <div class="col-md-8">
          <h2>SCHEDULE</h2>
          <p>{{$dt->format('l jS \\of F Y h:i:s A'); }} <br />
          From: {{$from}} <br />
          To: {{$to}}<p>  
        </div> <!-- /.col-md-8 -->

        <div class="col-md-12">
          <table class="table table-bordered">
            <thead >
              <tr>
                <th> Dapart </th>
                <th>Arrive</th>
                <th>Connection</th>
                <th>duration</th>
                <th>route</th>
                <th>Miles</th>
                <th>Train</th>
              </tr>
            </thead>
            
            <tbody>
          @if(!empty($trips))
            @foreach ($trips as $key => $trip)
              <?php $duration =$trip->arrive->diff($trip->depart); ?>
              <tr>
                <td>{{$trip->depart->format('l h:i A')}}</td>
                <td>{{$trip->arrive->format('l h:i A')}}</td>
                <td>{{$trip->connection}}</td>
                <td>
                    {{$duration->h ." H ,".$duration->i ." m"}}
                </td>
                <td>South West</td>
                @foreach ($trip->station as $key => $value) 
                  <td>{{$value->miles}}</td>
                @endforeach
                <td>{{$trip->train->train_name}}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td>No Result for this date</td>
            </tr>
          @endif
            </tbody>

          </table>
        </div> <!-- /.col-md-12 -->
      @endif
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop