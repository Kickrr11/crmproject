@extends('master')
 
@section('content')

<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <canvas id="myChart" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>		
		  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var data = {
        labels: {!! json_encode($accounts) !!},
        datasets: [
            {
                label: "My Data",                    
                data: {!! json_encode($accounts) !!}
            }
        ]
    };
	
	var myNewChart = new Chart(ctx , {
    type: "line",
	data:data,
    
	});
	console.log(data);

   
  </script>
  @endsection