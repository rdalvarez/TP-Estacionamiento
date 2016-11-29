function testU(){
    $('#email').val("user@test.com");
    $('#clave').val("micontraseñaTest");
}

function testA(){
    $('#email').val("admin@test.com");
    $('#clave').val("micontraseñaTest");
}

function ValidarLogin(){
    var usuario = $('#email').val();
    var clave = $('#clave').val();

    var pagina = "../nexo.php";
    var queHago = "ValidarLogin";

    $.ajax({
        url: pagina,
        type:'POST',
        dataType: 'json',
        data:{
            queHago:queHago,
            usuario:usuario,
            clave:clave
        }
    })
    .then(
        function bien(retorno){
            
            if (!retorno.Exito) {
                alert(retorno.Mensaje);
                $('#email').val("");
                $('#clave').val("");
                return;
            }

            alert(retorno.Mensaje);
            location.reload();
        }
        ,function error(jqXHR, textStatus, errorThrown){
            //$("#Error").html("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            alert("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
            console.log("ERROR: "+jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        }
    );

}
