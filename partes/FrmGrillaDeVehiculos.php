<?php require_once 'clases/vehiculo.php'; 
 $arrayDeVehiculos = Vehiculo::TraerTodosLosVehiculos();
?>
<script type="text/javascript" src="js/funcionesTabla.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-right">
                        <span class="clickable filter" data-toggle="tooltip" title="Desplegar/Contraer Filtro" data-container="body">
                            <i class="glyphicon glyphicon-filter"></i>
                        </span>
                    </div>
                    <h3 class="panel-title">Grilla de Vehiculos</h3>                    
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Ingrese lo que busca." />
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr class="filters">
                            <th>Patente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="text-center">Acción</th>
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
                            $fila.='<td class="text-center">
                            <a href="#" class="btn btn-success btn-xs" title="COBRAR"><span class="glyphicon glyphicon-usd"></span></a>
                            <a href="#" class="btn btn-info btn-xs" title="EDITAR"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="#" class="btn btn-danger btn-xs" title="BORRAR"><span class="glyphicon glyphicon-trash"></span></a></td>';
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
</div>
