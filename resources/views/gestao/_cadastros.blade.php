<div class="col-xs-12 col-sm-12 col-md-9 fundo-cheio">

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
                        text: "Quantidade de usuários cadastrados"
                    },
                    colorSet: "vivacolor",
                    axisX:{
                        title: "timeline",
                        gridThickness: 2
                    },
                    axisY: {
                        title: "Qtd Cadastrados"
                    },
                    data: [
                        {        
                            type: "area",
                            dataPoints: [//array
                                
                                @foreach($intervalos as $Intervalo)
                                { x: new Date("{{ $Intervalo->intervalo }}".replace(/-/g, "/")), y: {{ $Intervalo->qtd }} },
                                @endforeach
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
    @endif
</div>
