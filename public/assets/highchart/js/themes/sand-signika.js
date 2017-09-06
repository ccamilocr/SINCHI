/*
 Highcharts JS v5.0.14 (2017-07-28)

 (c) 2009-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(b){"object"===typeof module&&module.exports?module.exports=b:b(Highcharts)})(function(b){(function(a){a.createElement("link",{href:"https://fonts.googleapis.com/css?family\x3dSignika:400,700",rel:"stylesheet",type:"text/css"},null,document.getElementsByTagName("head")[0]);a.wrap(a.Chart.prototype,"getContainer",function(a){a.call(this);this.container.style.background="url(images/fondo_plots.png)"});a.theme={colors:"#f45b5b #8085e9 #aaeeee #F2F5A9 #50B432 #ED561B #DDDF00 #24CBE5 #64E572 #FF9655 #FFF263 #BDBDBD #6AF9C4 #ff0066 #8d4654 #eeaaee #55BF3B #DF5353 #7798BF #BDBDBD ".split(" "),
chart:{borderColor: 'grey',borderWidth: 1,type: 'line',backgroundColor:null,style:{fontFamily:"Signika, serif"}},title:{text:'',style:{color:"black",fontSize:"16px",fontWeight:"bold"}},subtitle:{style:{color:"black"}},tooltip:{borderWidth:0},credits: {enabled: false},legend:{layout: 'vertical',align: 'right',x: 0,verticalAlign: 'top',y: 5,floating: true,itemStyle:{fontWeight:"bold",fontSize:"13px"},itemHiddenStyle: {color: 'grey'}},xAxis:{labels:{style:{color:"#6e6e70"}}},yAxis:{labels:{style:{color:"#6e6e70"}},stackLabels: {enabled: true,style: {fontSize: '30px',fontWeight: 'bold',color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'}}},plotOptions:{series:{shadow:!0,pointWidth: 30},candlestick:{lineColor:"#404048"},map:{shadow:!1}, spline: {marker: {enabled: false}}},navigator:{xAxis:{gridLineColor:"#D0D0D8"}},rangeSelector:{buttonTheme:{fill:"white",stroke:"#C0C0C8","stroke-width":1,states:{select:{fill:"#D0D0D8"}}}},scrollbar:{trackBorderColor:"#C0C0C8"},background2:"#E0E0E8"};a.setOptions(a.theme)})(b)});
