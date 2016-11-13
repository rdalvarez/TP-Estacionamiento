function test(){
	$.ajax({
        url: "test.php"
    })
    .then(
        function bien(retorno){
        	$("#divModal").html(retorno);

        	$('#myModalNorm').modal({show:true,keyboard: false,backdrop: "static" });


    });
}


function test2(){

$('#myModalNorm').modal('hide');
}