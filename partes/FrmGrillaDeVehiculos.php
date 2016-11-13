    <script type="text/javascript" src="js/tabla.js"></script>
     <link rel="stylesheet" type="text/css" href="css/tabla.css">

<?php require_once 'clases/vehiculo.php'; 
 $arrayDeVehiculos = Vehiculo::TraerTodosLosVehiculos();
?>
<div class="container slideUp">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"> 

                    <div class="pull-right">
                    <input type="text" class="search form-control" placeholder="Filtro">
                    </div> 
                    <span class="counter pull-right"></span>  
                    <h4>Grilla de Vehiculos Estacionados</h4>                  
                </div>

                <div class="table-container scroll-window">
                    <table class="table table-hover table-striped results">
                      <thead>
                        <tr>
                           <th>Patente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        <tr class="warning no-result">
                          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach ($arrayDeVehiculos as $objVehiculo) 
                        {
                            $fila = '<tr>';
                            $fila.='<td id="patente'.$objVehiculo->id.'" value"'.$objVehiculo->patente.'" class="text-left scope="row"">'.$objVehiculo->patente.'</td>';
                            $fila.='<td class="text-left">'.$objVehiculo->fecha.'</td>';
                            $fila.='<td class="text-left">'.$objVehiculo->hora.'</td>';
                            $fila.='<td class="text-center">
                            <a onclick="CobrarVehiculo('.$objVehiculo->id.')" class="btn btn-success btn-xs" title="COBRAR"><span class="glyphicon glyphicon-usd"></span></a>
                            <a onclick="EditarVehiculo('.$objVehiculo->id.')" class="btn btn-info btn-xs" title="EDITAR"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a onclick="BorrarVehiculo('.$objVehiculo->id.')" class="btn btn-danger btn-xs" title="BORRAR"><span class="glyphicon glyphicon-trash"></span></a></td>';
                            $fila.='</tr>';

                            echo $fila;   
                        } 
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


