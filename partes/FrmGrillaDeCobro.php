<script type="text/javascript" src="js/tabla.js"></script>
<link rel="stylesheet" type="text/css" href="css/tabla.css">

<?php
require_once 'clases/importes.php';

$arrImportes = Importes::TraerTodosLosImportes();

?>

<div class="container slideUp">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"> 

                    <div class="pull-right">
                    <input type="text" class="search form-control" placeholder="Filtro">
                    </div> 
                    <span class="counter pull-right"></span>  
                    <h4>Grilla de Importes</h4>                  
                </div>

                <div class="table-container scroll-window">
                    <table class="table table-hover table-striped results">
                      <thead>
                        <tr>
                        	<th>ID</th>
                           	<th>Patente</th>
                            <th>Fecha Ininial</th>
                            <th>Fecha Final</th>
                            <th>Tiempo(hrs)</th>
                            <th>Importe</th>
                        </tr>
                        <tr class="warning no-result">
                          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($arrImportes as $objImporte) 
                        {
                            $fila = '<tr>';
                            $fila.='<td class="text-left scope="row"">'.$objImporte->id.'</td>';
                            $fila.='<td class="text-left">'.$objImporte->patente.'</td>';
                            $fila.='<td class="text-left">'.$objImporte->fecha ." ". $objImporte->hora .'</td>';
                            $fila.='<td class="text-left">'.$objImporte->fechaFinal." ".$objImporte->horaFinal.'</td>';
                            $fila.='<td class="text-left">'.number_format($objImporte->tiempoTranscurrido/3600, 2, '.', '').'</td>';
							$fila.='<td class="text-left">$ '.$objImporte->importe.'</td>';
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

<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>
