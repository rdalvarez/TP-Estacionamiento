$(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});

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
        }
    );
}

function NuevoVehiculo(){
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
            //$("#ingreso").html(retorno);
            if (!retorno.Exito) {
                alert(retorno.Mensaje);    //            
            }

            alert(retorno.Mensaje);

             $("#cuerpo").html("");

        }
        ,function error(jqXHR, textStatus, errorThrown){

            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}

function VerGrillaVehiculos(){
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
            $("#ingreso").html(retorno);
        }
        ,function error(jqXHR, textStatus, errorThrown){

            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}
