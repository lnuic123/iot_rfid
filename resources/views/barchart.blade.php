
<head>
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

@extends('layouts.app')
@section('content')

<body>
  <div class="container" style="width: 1000px">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    let myChart = document.getElementById('myChart').getContext('2d');
    var dates = {!! json_encode($dates) !!};
    var time1 = {!! json_encode($time1) !!};
    var time2 = {!! json_encode($time2) !!};
    var time3 = {!! json_encode($time3) !!};
    var time4 = {!! json_encode($time4) !!};
    var time5 = {!! json_encode($time5) !!};
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
    let massPopChart = new Chart(document.getElementById("myChart"), {
  type: 'line',
  data: {
    labels: dates,
    datasets: [{ 
        data: time1,
        label: "Korisnik 1",
        borderColor: "blue",
        fill: false
      },{ 
        data: time2,
        label: "Korisnik 2",
        borderColor: "red",
        fill: false
      },{ 
        data: time3,
        label: "Korisnik 3",
        borderColor: "yellow",
        fill: false
      },{ 
        data: time4,
        label: "Korisnik 4",
        borderColor: "green",
        fill: false
      },{ 
        data: time5,
        label: "Korisnik 5",
        borderColor: "orange",
        fill: false
      }
    ]
  },
  options: {
    scales: {
            xAxes: [{
                type: 'time',
                time: {
                    displayFormats: {
                        quarter: 'MMM'
                    }
                }
            }],
            yAxes: [
            {
                ticks: {
                    callback: function(label, index, labels) {
                        var min = Math.floor( (label - Math.floor(label/3600)*3600)/60 );
                        if(min>9){
                          return Math.floor(label/3600) + ":" +  min;
                        }
                        else{
                          return Math.floor(label/3600) + ":0" +  min;
                        }
                    }
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Vrijeme dolaska'
                }
            }
        ]
        },
    title:{
      display:true,
      text:'Vrijeme dolaska korisnika',
      fontSize:25
    },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        tooltips:{
          enabled:true
        }
  }
});
  </script>

@endsection