<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Cabeza -->
            <div class="modal-header">
                <button onclick ="CerrarModal()" type="button" class="close"><span aria-hidden="true" class="glyphicon glyphicon-remove "></span></button>
                <h4 class="modal-title" id="myModalLabel"> Nuevo Usuario</h4>
            </div>
            
            <!-- Modal Cuerpo -->
            <div class="modal-body">
              <form role="form">
                <div class="form-group">
                  <label for="patente">Alta de Usuario</label>
                  <input type="text" class="form-control" id="mail" placeholder="Mail"/>
                  <input type="text" class="form-control" id="password" placeholder="Contraseña"/>
                  <select class="form-control selcls" id="permiso">
                   <optgroup label="Permiso">
                    <option value="usuario" selected>Usuario</option>
                    <option value="administrador">Administrador</option>
                    </optgroup>
                  </select>
                </div>
              </form>
            </div>
            
            <!-- Modal Pie -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="CerrarModal()"> Cerrar </button>
                <button type="button" class="btn btn-primary" onclick="AltaUsuario()"> Crear </button>
            </div>
        </div>
    </div>
</div>