@extends('app')
@section('content')
<div class="container-fluid">
    <div id="chart_div" style="height: 400px"></div>
</div>
 <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

             
                        var data = google.visualization.arrayToDataTable([ 

                            ['Mes', 'Total Serviços Mes',],
                            
                                ['Janeiro', {{$janeiro}}],
                                ['Fevereiro', {{$fevereiro}}],
                                ['Março', {{$marco}}],
                                ['Abril', {{$abril}}],
                                ['Maio', {{$maio}}],
                                ['Junho', {{$junho}}],
                                ['Julho', {{$julho}}],
                                ['Agosto', {{$agosto}}],
                                ['Setembro', {{$setembro}}],
                                ['Outubro', {{$outubro}}],
                                ['Novembro', {{$novembro}}],
                                ['Dezembro', {{$dezembro}}],
                        ]);

                          var options = {
                            title: 'Grafico Desempenho Serviços por Mes - ANO 2018',
                            backgroundColor: 'transparent',
                            chartArea: {width: '70%', height: '80%'},
                            hAxis: {
                              title: 'Quantidade',
                              minValue: 0
                            },
                            vAxis: {
                              title: 'Ano 2018'
                            }
                          };

                      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

                      chart.draw(data, options);          
                
               
            }
        

              
    
    </script>




    


@endsection
