<script type="text/javascript" src="js/tabla.js"></script>
<link rel="stylesheet" type="text/css" href="css/tabla.css">

<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'clases/usuario.php';
$arrUsuarios = Usuario::TraerTodosLosUsuarios();
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

                    <h4>Grilla de Usuarios <a data-toggle="tooltip" onclick="FrmNuevoUsuario()" class="btn btn-success btn-xs" title="Nuevo Usuario"><span class="glyphicon glyphicon-plus"></span></a></h4>                  
                </div>

                <div class="table-container scroll-window">
                    <table class="table table-hover table-striped results">
                      <thead>
                        <tr>
                        	<th>Id</th>
                            <th>Usuario</th>
                            <th>Permiso</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        <tr class="warning no-result">
                          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($arrUsuarios as $objUsuario) 
                        {
                            $fila ='<tr>';
                            $fila.='<td class="text-left scope="row"">'.$objUsuario->id.'</td>';
                            $fila.='<td class="text-left">'.$objUsuario->usuario.'</td>';
                            $fila.='<td class="text-left">'.$objUsuario->permiso.'</td>';
                            $fila.='<td class="text-center">';
                            //$fila.='<a data-toggle="tooltip" onclick="FrmEditarUsuario('.$objUsuario->id.')" class="btn btn-info btn-xs" title="EDITAR"><span class="glyphicon glyphicon-pencil"></span></a> ';
                            $fila.= '<a data-toggle="tooltip" onclick="BorrarUsuario('.$objUsuario->id.')" class="btn btn-danger btn-xs" title="BORRAR"><span class="glyphicon glyphicon-trash"></span></a>';
                            $fila.='</td></tr>';

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
