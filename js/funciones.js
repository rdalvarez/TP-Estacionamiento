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
        }
    );
}

function FrmIngreso(){
    var pagina = "nexo.php";
    var queHago = "FrmIngreso";

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

function NuevoVehiculo(){
    var patente = $('#txtPatente').val();
    alert(patente);
}

