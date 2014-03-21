@extends('layouts.master')

@section('title','Schedule - Al Saoudi')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <a class="btn btn-primary" href="{{url('admin/dashboard/trains/add')}}">Add</a>
            <thead >
              <tr>
                <th>Trains</th>
                <th>Actions</th>
              </tr>
            </thead>
            
            <tbody>
                @if(!empty($trains))
                  @foreach ($trains as $key => $train)
                    <tr>
                      <td>{{$train->train_name}}</td>
                      <td>
                        <a class="btn btn-primary" href='{{url("admin/dashboard/trains/$train->id/edit")}}'>Edit</a>
                        

                        {{Form::open(array('url'=>"admin/dashboard/trains/{$train->id}"))}}

                          <input type="submit" class="btn btn-primary" value="Remove"/>

                        {{Form::close()}}
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td>No tations yet</td>
                  </tr>
                @endif
            </tbody>

          </table>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop