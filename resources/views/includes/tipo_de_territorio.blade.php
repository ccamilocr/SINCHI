<script type="text/javascript">
function tipo_de_territorio(t_territorio){
	var datos=[];
    $(t_territorio).each(function(i){
        if(t_territorio[i].tipodeterritorio=="resguardo"){
            datos[i]=["Resguardo",parseInt(t_territorio[i].registros)];            
        } else if(t_territorio[i].tipodeterritorio=="vereda"){
           datos[i]=["Vereda",parseInt(t_territorio[i].registros)];             
        } else {
           datos[i]=["Centro Poblado",parseInt(t_territorio[i].registros)];             
        } 
    });

    Highcharts.setOptions({
        colors: ['#923A48', '#BE5A6A', '#F0DADD']
    });


    Highcharts.chart('tipo_territorio_plot', {
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