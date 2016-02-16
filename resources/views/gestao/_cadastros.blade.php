<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    @if(isset($intervalos))
    <div id="chart_div"></div>

    <script type="text/javascript">
        window.onload = function () {
            CanvasJS.addColorSet("vivacolor",
            [//colorSet Array

                "#F16F2B",
                "#F16F2B",
                "#8BA6AC",
                "#F16F2B",
                "#F16F2B"
            ]);
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title:{
                        text: "Simple Date-Time Chart"
                    },
                    colorSet: "vivacolor",
                    axisX:{
                        title: "timeline",
                        gridThickness: 2
                    },
                    axisY: {
                        title: "Downloads"
                    },
                    data: [
                        {        
                            type: "area",
                            dataPoints: [//array
                                
                                { x: new Date(2012, 01, 1), y: 26},
                                { x: new Date(2012, 01, 2), y: 26},
                                { x: new Date(2012, 01, 3), y: 26},
                                { x: new Date(2012, 01, 4), y: 26},
                                { x: new Date(2012, 01, 5), y: 26},
                                { x: new Date(2012, 01, 6), y: 26},
                                { x: new Date(2012, 01, 7), y: 26},
                                { x: new Date(2012, 01, 8), y: 26},
                                { x: new Date(2012, 01, 9), y: 26}

                            ]
                        }
                    ]
                });

                chart.render();
        }
    </script>
    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <div id="chartContainer" style="height: 300px; width: 100%;">
    </div>
@foreach($intervalos as $Intervalo)
                                {{ print_r($Intervalo) }}
                                @endforeach
    @endif
</div>
