var pagina = "nexo.php";


function FrmNuevoVehiculo(){
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

    var queHago = "NuevoVehiculo";

    var vehiculo = {"patente":$('#txtPatente').val()};

    //VALIDAR STRING DE PATENTE

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

            if (!retorno.Exito) {
                alert(retorno.Mensaje);
                $("#cuerpo").html(" ");
                return;
            }
            alert(retorno.Mensaje);
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

    var queHago = "BorrarVehiculo";
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

function Desloguear(){
    var funcionAjax=$.ajax({
        url:"partes/Desloguear.php",
        type:"post"     
    });
    funcionAjax.done(function(retorno){
           alert("Esperamos volver a verlo. ");            
    }); 
}


function FrmGrillaDeCobro(){
    var queHago = "FrmGrillaDeCobro";

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

function Balances(){
    
}