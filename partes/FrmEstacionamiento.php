<?php require_once 'clases/vehiculo.php'; 
 $arrayDeVehiculos = Vehiculo::TraerTodosLosVehiculos();
?>


		<?php 
/*		foreach ($arrayDeVehiculos as $objVehiculo) {
			$fila = '<tr>';
			$fila.='<td class="text-left">'.$objVehiculo->patente.'</td>';
			$fila.='<td class="text-left">'.$objVehiculo->estacionado.'</td>';
			$fila.='<td class="text-left">'.$objVehiculo->fecha.'</td>';
			$fila.='<td class="text-left">'.$objVehiculo->hora.'</td>';
			$fila.='<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
			$fila.='</tr>';

			echo $fila;
		} */
		?>
  
