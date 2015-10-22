function Login()
{
	alert("login");
var varCorreo=$("#correo").val();
var varClave=$("#clave").val();

var funcionAjax=$.ajax({

	url:"php/ValidarUsuario.php",
	type:"post",
	data:{
		correo:varCorreo,
		clave:varClave
	}
});

funcionAjax.done(function(retorno){
alert(retorno);
			if(retorno.trim()=="correcto")
        		{

        			MostrarIngreso();
					//$("#informe").html("Correcto Form login!!!");
					}
        		else
        		{
        			$("#informe").html("NO esta registrado... ");
        		}

});

funcionAjax.fail(function(retorno){
		
		$("#informe").html("ERROR !!!!");	
		});

}

function desloguear()

{

	var funcionAjax=$.ajax({
		url:"php/desloguearUsuario.php",
		type:"post"
		});
		funcionAjax.done(function(retorno){

			MostrarIngreso();
			$("#informe").html("LOGOUT!!!");


		});

}




