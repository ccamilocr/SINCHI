<script type="text/javascript">
bounds = new L.LatLngBounds(new L.LatLng(-5, -81.66), new L.LatLng(12.6, -66.5));
var map = L.map('map', {
            center: [4, -72.66],
            zoom: 5,
            scrollWheelZoom: true,
            minZoom: 5,
            maxZoom: 15,
            maxBounds: bounds,
            zoomControl:true
});

//rem_map.dragging.disable();

var CartoDB_Positron = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
	subdomains: 'abcd',
	maxZoom: 19
}).addTo(map);	

//Add Colombia line
var colombia_line = new L.geoJson(colombia,{style: colombia_style}).addTo(map);

function colombia_style(feature) {
    return {
        weight: 2,        
        color: 'black',
        fillOpacity: 0,
        dashArray: '1',        
    };
}

function load_map(datos,filtros,points){
	try {				
		map.removeLayer(deptos_layer_query);
		map.removeLayer(mpios_layer_query);	
        map.removeLayer(points_query);					
	} catch(err) {    	  	
	}
	

	if(filtros[0]!='00'){
        if(filtros[1]!='00'){
            //Mapa departamental
            //cargar capa municipal
            geojson_mpios={
                type: 'FeatureCollection',
                features: []
            };
            $(datos).each(function(i){
                var muni_query=datos[i].cod_dane;            
                $(mpios_vector.features).each(function(j){
                    var muni_temp=mpios_vector.features[j].properties.cod_codane;               
                    if(muni_temp==muni_query){
                        objeto={
                            type: 'Feature',
                            properties: {                                                       
                                'nombre_mpio': datos[i].nom_mpio,
                                'registros': parseInt(datos[i].registros_mpio),
                            },
                            geometry: mpios_vector.features[j].geometry
                        }
                        var x=geojson_mpios.features.length             
                        geojson_mpios.features[x]=objeto    
                    }
                });            
            });
            mpios_layer_query = new L.geoJson(geojson_mpios,{style: style, onEachFeature: mpios_interaction}).addTo(map);
            map.fitBounds(mpios_layer_query.getBounds());
            //Cargar las coordenadas de la capa de puntos
            geojson_points={
                type: 'FeatureCollection',
                features: []
            };
            $(points).each(function(i){
                objeto={
                    type: 'Feature',
                    properties: {                                                       
                        'nombre_mpio': datos[i].nom_mpio,
                        'registros': parseInt(datos[i].registros_mpio),
                    },
                    geometry: jQuery.parseJSON(points[i].point)
                }
                var x=geojson_points.features.length             
                geojson_points.features[x]=objeto
            });
            points_query = new L.geoJson(geojson_points,{}).addTo(map);
        } else {
            //Mapa departamental
            //cargar capa municipal
            geojson_mpios={
                type: 'FeatureCollection',
                features: []
            };
            $(datos).each(function(i){
                var muni_query=datos[i].cod_dane;            
                $(mpios_vector.features).each(function(j){
                    var muni_temp=mpios_vector.features[j].properties.cod_codane;               
                    if(muni_temp==muni_query){
                        objeto={
                            type: 'Feature',
                            properties: {                                                       
                                'nombre_mpio': datos[i].nom_mpio,
                                'registros': parseInt(datos[i].registros_mpio),
                            },
                            geometry: mpios_vector.features[j].geometry
                        }
                        var x=geojson_mpios.features.length             
                        geojson_mpios.features[x]=objeto    
                    }
                });            
            });
            mpios_layer_query = new L.geoJson(geojson_mpios,{style: style, onEachFeature: mpios_interaction}).addTo(map);
            //Cargar capa de departamentos tipo linea
            geojson_deptos_line={
                type: 'FeatureCollection',
                features: []
            };
            $(datos).each(function(i){
                var depto_query=(datos[i].cod_dane).substring(0, 2) ;            
                $(deptos_line_vector.features).each(function(j){
                    var depto_temp=deptos_line_vector.features[j].properties.COD_DEPTO;                                         
                    if(depto_temp==depto_query){
                        objeto={
                            type: 'Feature',
                            properties: {
                                'cod_depto': datos[i].departamento,
                                'nombre': datos[i].nom_dpto,                            
                                'registros': parseInt(datos[i].registros_depto),
                            },
                            geometry: deptos_line_vector.features[j].geometry
                        }
                        console.log(objeto)
                        var x=geojson_deptos_line.features.length                
                        geojson_deptos_line.features[x]=objeto   
                    }
                });            
            });
            deptos_layer_query = new L.geoJson(geojson_deptos_line,{style: style_line}).addTo(map);
            map.fitBounds(deptos_layer_query.getBounds()); 
        }
            

    } else {
        //Mapa Nacional        
        geojson_deptos={
			type: 'FeatureCollection',
	        features: []
		};		
        $(datos).each(function(i){
            var depto_query=datos[i].departamento;            
            $(deptos_vector.features).each(function(j){
            	var depto_temp=deptos_vector.features[j].properties.COD_DEPTO;            	
            	if(depto_temp==depto_query){
            		objeto={
						type: 'Feature',
				   		properties: {
				   			'cod_depto': datos[i].departamento,
			                'nombre': datos[i].nom_dpto,			                
			                'registros': parseInt(datos[i].registros_depto),
				   		},
				   		geometry: deptos_vector.features[j].geometry
				   	}
				   	var x=geojson_deptos.features.length				
					geojson_deptos.features[x]=objeto	
            	}
            });            
        });
        deptos_layer_query = new L.geoJson(geojson_deptos,{style: style, onEachFeature: deptos_interaction}).addTo(map);
        map.fitBounds(deptos_layer_query.getBounds());
    }
}

//DEPARTAMENTOS, MUNICIPIOS INTERACTION AND STYLE
function deptos_interaction(feature, layer) {
  var dato="<table class='table table_leaflet'><tr><td class='table_leaflet_tittle'>Departamento:</td><td>" + feature.properties.nombre + "</td></tr><tr><td class='table_leaflet_tittle'>Encuestas:</td><td>" + feature.properties.registros + "</td></tr></table>";  
  layer.bindTooltip(dato);
  //layer.bindPopup(dato);
}

function mpios_interaction(feature, layer) {
  var dato="<table class='table table_leaflet'><tr><td class='table_leaflet_tittle'>Municipio:</td><td>" + feature.properties.nombre_mpio + "</td></tr><tr><td class='table_leaflet_tittle'>Encuestas:</td><td>" + feature.properties.registros + "</td></tr></table>";  
  layer.bindTooltip(dato);
  //layer.bindPopup(dato);
}

function style(feature) {
    return {
        fillColor: getColor(feature.properties.registros),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
}

function style_line(feature) {
    return {        
        weight: 2,
        opacity: 1,
        color: 'black',
        dashArray: '2',        
    };
}

function getColor(d) {
    return d > 100 ? '#800026' :
           d > 50  ? '#BD0026' :
           d > 20  ? '#E31A1C' :
           d > 10  ? '#FC4E2A' :
           d > 5   ? '#FD8D3C' :
           d > 2   ? '#FEB24C' :
           d > 1   ? '#FED976' :
                      '#FFEDA0';
}

var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 1, 2, 5, 10, 20, 50, 100],
        labels = [];

    // loop through our density intervals and generate a label with a colored square for each interval
    for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
    }

    return div;
};

legend.addTo(map);
</script>