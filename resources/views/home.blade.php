@extends('adminlte::page')

@section('title', 'Página Principal')

@section('content_header')
<div class="container-fluid">
        <h1>
          Métricas del proyecto Sayonara Constru
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Métricas</li>
        </ol>
      </div>
@stop

@section('content')
    
<div class="container-fluid">
  <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</div>
    

@stop

@section('js')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Branch: Develop', 'Commits', 'Issues', 'Comments' ],
              ['Ariel', 3, 5, 3],
              ['Benjamín', 3, 2, 1],
              ['Diego', 1, 3, 2],
              ['Gabriel', 1, 2, 4],
              ['Roberto', 2, 3, 2],
              ['José', 2, 2, 2],

      ]);

      var options = {
        width: 1000,
        height: 400,
        legend: { position: 'top', maxLines: 50 },
        bar: { groupWidth: '90%' },
        isStacked: true,
      };


        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        google.visualization.events.addListener(chart, 'select', function(){

          var elementoSeleccionado = chart.getSelection()[0];
          if(elementoSeleccionado){
            var valorSeleccionado = data.getValue(elementoSeleccionado.row, 0);
            alert("El valor seleccionado es: " + valorSeleccionado);


          


          }


        });

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      
    </script>

@stop