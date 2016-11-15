<?php
session_start();

require_once 'clases/vehiculo.php';

$id = $_SESSION['FID'];

$objVehiculo = Vehiculo::TraerUnVehiculo($id);
 ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Cabeza -->
            <div class="modal-header">
                <button onclick ="CerrarModal()" type="button" class="close"><span aria-hidden="true" class="glyphicon glyphicon-remove "></span></button>
                <h4 class="modal-title" id="myModalLabel"> Edicion de Patente: <?php echo ($objVehiculo->patente); ?></h4>
            </div>
            
            <!-- Modal Cuerpo -->
            <div class="modal-body">
              <form role="form">
                <div class="form-group">
                  <label for="patente">Cambiar Patente</label>
                  <input type="text" class="form-control" id="txtPatente" placeholder="Patente"/>
                  <input type="hidden" name="hiddenId" id="hiddenId" value= "<?php echo ($objVehiculo->id ); ?>" >
                </div>
              </form>
            </div>
            
            <!-- Modal Pie -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="CerrarModal()"> Cerrar </button>
                <button type="button" class="btn btn-primary" onclick="EditarVehiculo(<?php echo $objVehiculo->id ?>)"> Guardar Cambios </button>
            </div>
        </div>
    </div>
</div>