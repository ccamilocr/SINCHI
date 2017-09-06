<script type="text/javascript">
var datos={!!$reg_per_depto!!};
var reg_per_depto=[];
$(datos).each(function(i){
	reg_per_depto[i]=[datos[i].nom_dpto,parseInt(datos[i].registros)]
});
Highcharts.chart('departamentos_plot', {
    chart: {        
        type: 'column'
    },
    title: {
        text: ''
    },    
    xAxis: {
        type: 'category',
        labels: {
            
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {        
        title: {
            text: 'Número de encuestas'
        }
    },
    legend: {
        enabled: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.075,
            borderWidth: 0.1
        }
    },
    tooltip: {
        pointFormat: '<b>{point.y}</b>'
    },
    series: [{
        name: 'Departamento',
        color: 'rgb(136, 136, 136)',
        data: reg_per_depto,
        dataLabels: {
            enabled: true,
            rotation: 0,
            color: '#FFFFFF',
            
            format: '{point.y}', // one decimal
            y: 20, // 10 pixels down from the top
            style: {
                fontSize: '10px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>