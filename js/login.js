// document.getElementById('email').addEventListener('input', function() {
//     campo = event.target;
//     valido = document.getElementById('emailOK');
        
//     emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
//     //Se muestra un texto a modo de ejemplo, luego va a ser un icono
//     if (emailRegex.test(campo.value)) {
//       valido.innerText = "válido";
//     } else {
//       valido.innerText = "incorrecto";
//     }
// });

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
