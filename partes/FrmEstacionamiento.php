<?php require_once 'clases/vehiculo.php'; 
 $arrayDeVehiculos = Vehiculo::TraerTodosLosVehiculos();
?>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Grilla de Vehiculos Estacionados</h3>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Patente" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Fecha" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Hora" disabled></th>
                        <th><input type="text" class="form-control text-center" placeholder="Acción" disabled></th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
					foreach ($arrayDeVehiculos as $objVehiculo) {
						if ($objVehiculo->estacionado = 1) { //SOLO MUESTRO AUTOS ESTACIONADOS
							$fila = '<tr>';
							$fila.='<td class="text-left">'.$objVehiculo->patente.'</td>';
							$fila.='<td class="text-left">'.$objVehiculo->fecha.'</td>';
							$fila.='<td class="text-left">'.$objVehiculo->hora.'</td>';
							$fila.='<td class="text-center"><a class="btn btn-info btn-xs" href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>';
							$fila.='</tr>';

							echo $fila;							
						}
					} 
					?>

                </tbody>
            </table>
        </div>
    </div>
</div>


  
