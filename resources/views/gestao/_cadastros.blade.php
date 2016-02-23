<div class="col-xs-12 col-sm-12 col-md-9 fundo-cheio">

    <div class="row" id="consulta_users_gestao">
        <div class="col-sm-12">
            <h2>Consultar usuários cadastrados por data</h2>
        </div>
        <div class="col-sm-5">
            <input placeholder="Data inicial" data-provide="datepicker" data-date-today-highlight="true" data-date-language="pt-BR" data-date-format="dd/mm/yyyy" data-date-autoclose="true" id="data-inicial" name="data-inicial" class="form-control mascara-data" data-date-default-view-date="-1y" type="text">
        </div>
        <div class="col-sm-5">
            <input placeholder="Data final" data-provide="datepicker" data-date-today-highlight="true" data-date-language="pt-BR" data-date-format="dd/mm/yyyy" data-date-autoclose="true" id="data-final" name="data-final" class="form-control mascara-data" data-date-end-date="0d" type="text">
        </div>
        <div class="col-sm-2">
            <button id="consulta-grafico" type="button" class="btn btn-acao">Consultar</button>
        </div>
    </div>
    <div id="chart_div">
    </div>

    <script type="text/javascript">

        window.onload = function(){
            $("#consulta-grafico").click(function(){
                dataInicio = $("input#data-inicial").val().split('/').reverse().join("-");
                dataFim = $("input#data-final").val().split('/').reverse().join("-");
                $.ajax({
                    url: "/gestao/users",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        data_inicio: dataInicio,
                        data_fim: dataFim
                    }
                }).done(function(data) {
                    atualizaChart(data);
                }).error(function() {
                    alert('Algo deu errado, tente novamente.');
                });
            });
        }

        atualizaChart = function(data) {
            graficoXY = [];
            data.forEach(function(intervalo) {
                console.log(intervalo);
                graficoXY.push({ x: new Date(intervalo.intervalo.replace(/-/g, "/")), y: intervalo.qtd});
            });
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
                            dataPoints: graficoXY
                        }
                    ]
                });

                chart.render();
        }
    </script>
    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <div id="chartContainer" style="height: 300px; width: 100%;">
    </div>
</div>
