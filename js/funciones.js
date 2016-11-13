// $(document).ready(function(){
//     //Handles menu drop down
//     $('.dropdown-menu').find('form').click(function (e) {
//         e.stopPropagation();
//     });
// });

function FrmNuevoVehiculo(){
    var pagina = "nexo.php";
    var queHago = "FrmNuevoVehiculo";

    $.ajax({
        url: pagina,
        type:'POST',
        data:{
            queHago:queHago
        }
    })
    .then(
        function bien(retorno){
            $("#cuerpo").html(retorno);
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}

function NuevoVehiculo(){
    if (!confirm("Estas seguro ingresar la Patente: " + $("#txtPatente").val())) {
        return;
    } 

    var pagina = "nexo.php";
    var queHago = "NuevoVehiculo";

    var vehiculo = {"patente":$('#txtPatente').val()};

    //   console.log (queHago+vehiculo);
    //FALTA VALIDAR PATENTE

     $.ajax({
        url: pagina,
        type:'POST',
        dataType: 'json',
        data:{
            queHago:queHago,
            vehiculo:vehiculo
        }
    })
    .then(
        function bien(retorno){
            alert("Mensaje: \n\t"+ retorno.Mensaje);
             $("#cuerpo").html(" ");
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}

function FrmEstacionamiento(){
    var pagina = "nexo.php";
    var queHago = "VerGrilla";

    $.ajax({
        url: pagina,
        type:'POST',
        data:{
            queHago:queHago,
        }
    })
    .then(
        function bien(retorno){
            $("#cuerpo").html(retorno);
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}

function CobrarVehiculo($id)
{
    if (!confirm("Estas seguro de cobrar?")) {
        return;
    } 

    var pagina = "nexo.php";
    var queHago = "CobrarVehiculo";
    var id = $id;

    $.ajax({
        url: pagina,
        type:'POST',
        dataType: 'json',
        data:{
            queHago:queHago,
            id:id
        }
    })
    .then(
        function bien(retorno){
            if (!retorno.Exito) {
                alert(retorno.Mensaje);
                return;
            }
            //$("#cuerpo").html(retorno);
            
            alert(retorno.Mensaje);
            //console.log(retorno);

            FrmEstacionamiento();
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );

}

function FrmEditarVehiculo($id)
{
    var pagina = "nexo.php";
    var queHago = "FrmEditarVehiculo";
    var id = $id;

    $.ajax({
        url: pagina,
        type:'POST',
        data:{
            queHago:queHago,
            id:id
        }
    })
    .then(
        function bien(retorno){
            $("#divModal").html(retorno);
            $('#myModal').modal({show:true,keyboard: false,backdrop: "static" });
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );

}

function EditarVehiculo(){

    if (!confirm("ESTAS A PUNTO DE EDITAR EL VEHICULO ESTACIONADO\n¿Estas seguro?")) {
        return;
    } 

    var id = $('#hiddenId').val();
    var patente = $('#txtPatente').val();
    var pagina = "nexo.php";
    var queHago = "EditarVehiculo";

    $.ajax({
        url: pagina,
        type:'POST',
        dataType: 'json',
        data:{
            queHago:queHago,
            patente:patente,
            id:id
        }
    })
    .then(
        function bien(retorno){
            if (!retorno.Exito) {
                alert(retorno.Mensaje);
                return;
            }
            //$("#cuerpo").html(retorno);
            
            alert(retorno.Mensaje);
            console.log(retorno);
            CerrarModal();
            FrmEstacionamiento();
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );


}

function CerrarModal(){
    $('#myModal').modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();    
    $('#divModal').html(" ");
}


function BorrarVehiculo($id)
{
    if (!confirm("ESTAS A PUNTO DE BORRAR PERMANENTEMENTE EL VEHICULO\n¿Estas seguro?")) {
        return;
    } 
}