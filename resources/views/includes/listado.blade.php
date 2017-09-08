<script type="text/javascript">
function listado_emprendimientos(listado,filtros){	
	$('#table_div').empty();
	//Data information table query
	var table = $('<table style="width: 100%"></table>');
	table.append('<thead><tr><th>Emprendimiento</th><th>Representante Legal</th></tr></thead>');
	table.append('<tbody>');
	for(var i = 0; i < listado.length; i++){
	    var row = '<tr style="height: 20px"><td>'+listado[i].nombreemprendimiento+'</td><td id="region">'+listado[i].nombrereplegal+" "+listado[i].apellidoreplegal+'</td></tr>';
    	table.append(row);
	}
	table.append('</tbody>');
	table.attr('id', 'example');
	$('#table_div').append(table);
	$('#table_div').addClass('table');

}
</script>