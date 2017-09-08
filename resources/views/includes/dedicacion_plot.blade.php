<script type="text/javascript">
function dedicacion(dedicacion,filtros){
    console.log(dedicacion)
    var datos=[];
    $(dedicacion).each(function(i){
        if(dedicacion[i].dedicaempren=="1"){
            datos[i]=["Producir",parseInt(dedicacion[i].registros)];            
        } else if(dedicacion[i].dedicaempren=="2"){
           datos[i]=["Colectar",parseInt(dedicacion[i].registros)];             
        } else if(dedicacion[i].dedicaempren=="3"){
           datos[i]=["Procesar",parseInt(dedicacion[i].registros)];             
        } else {
           datos[i]=["Comercializar",parseInt(dedicacion[i].registros)];              
        }
    });
    
    Highcharts.setOptions({
        colors: ['#923A48', '#BE5A6A', '#D4909C', '#F0DADD']
    });

    Highcharts.chart('dedicacion_plot', {
        chart: {        
            type: 'pie'
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
                text: 'Número de emprendimientos'
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
            name: 'Tipo',
            color: 'rgb(136, 136, 136)',
            data: datos,
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#FFFFFF',
                //y: 20, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
}
</script>