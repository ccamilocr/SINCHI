<script type="text/javascript">
var anio_constitucion={!!$anio_constitucion!!};
var p_2010=0, p_2000_2010=0, p_1990_2000=0,p_1990=0; 
$(anio_constitucion).each(function(i){
	var year=anio_constitucion[i].anoconstruccemprend.substr(0, 4)
	if(year>=2010){
		p_2010=p_2010+1;
	} else if(year>=2000){
		p_2000_2010=p_2000_2010+1;
	} else if(year>=1990){
		p_1990_2000=p_1990_2000+1;
	} else {
		p_1990=p_1990+1;
	}
});

anio_constitucion=[['>2010',p_2010],['2000-2009',p_2000_2010],['1990-1999',p_1990_2000],['<1990',p_1990]]
console.log(anio_constitucion)
Highcharts.chart('constitucion_plot', {
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
        name: 'Periodo',
        color: 'rgb(136, 136, 136)',
        data: anio_constitucion,
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