function Frm(queHago){
    var queHago = queHago;
    var pagina = "nexo.php";

    $.ajax({
        url: pagina,
        type:'POST',
        data:{
            queHago:queHago,
        }
    })
    .then(
        function bien(retorno){
            $("#informe").html(retorno);
        }
        ,function error(jqXHR, textStatus, errorThrown){

            $("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );
}

function NuevoVehiculo(){
    var patente = $('#txtPatente').val();
    alert(patente);
}

