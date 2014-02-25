<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h1 class="logo"><img src="{{asset('assets/img/logo.png')}}"></h1>
      </div>
      <div class="col-md-8">
        <nav class="nav">
          <ul class=" list-inline pull-right">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('trips.index')}}">Schedule</a></li>
            <li><a href="{{route('stations.index')}}">Stations</a></li>
            <li><a href="#">Deals </a></li>
            @if(! Auth::check())
              <li><a href="{{url('account/login')}}">Sign In</a></li>
              <li><a href="{{url('account')}}">Sign Up </a></li>
            @endif
            @if(Auth::check())
              <li> <a href="{{route('tickets.index')}}">Your Ticket</a></li>
            @endif
          </ul>
        </nav>

      </div> <!-- /.col-md-8 -->

    </div> <!-- /.row -->
  </div> <!-- /.content -->
</div> <!-- /.Header -->