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
                <th> Ticket Code </th>
                <th>trip</th>
              </tr>
            </thead>
            
            <tbody>
            @if(! empty($usertickets))
              @foreach ($usertickets as $userticket)
              <tr>
                    <td>
                      {{$userticket->code}}
                    </td>
                    @foreach ($usertickets->tr as $key => $trip)
                        <td>
                          {{$trip->station_dep}} ===> {{$trip->station_arr}}
                        </td>
                      <?php continue;?>
                    @endforeach
              </tr>
              @endforeach
            @else
              <tr>
                <td>You do not have any tickets</td>
              </tr>
            @endif
            </tbody>

          </table>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.ontent -->

@stop