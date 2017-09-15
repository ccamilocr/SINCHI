<script type="text/javascript">
function tipo_producto(t_producto){
	var datos=[];
    $(t_producto).each(function(i){
        if(t_producto[i].tipoproducto=="1"){
            datos[i]=["Cultivado",parseInt(t_producto[i].registros)];            
        } else {
           datos[i]=["Silvestre",parseInt(t_producto[i].registros)];             
        }
    });

    Highcharts.setOptions({
        colors: ['#923A48', '#F0DADD']
    });

    Highcharts.chart('tipo_cultivo_plot', {
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