function MostrarRegistro()
{

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarRegistro"
		}

			});


	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});

	funcionAjax.fail(function(retorno){
	
		//alert("ERROR");
	});
}

function MostrarIngreso()
{

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarIngreso"
		}
	});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	
	funcionAjax.fail(function(retorno){
	
		//alert("ERROR");
	});
}

function Listado()
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarListado"}
	});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
		
	})
funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});

}