<div class="col-xs-12 col-sm-6 col-md-4 fundo-cheio">

        @if(isset($cadastros))
        <div id="chart_div"></div>


<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
        @foreach($cadastros as $Perfil)
        ['{{ $Perfil->nome }}', {{ $Perfil->created_at}} ],
        @endforeach
        ['', 0]
        ]);

        var options = {
          title: 'Usuários registrados',
          colors: ['#F16F2B']
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

        @endif
</div>
