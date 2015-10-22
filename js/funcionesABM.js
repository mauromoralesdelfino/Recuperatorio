function GuardarUsuario()
{	

	var id=$("#idUsuario").val();
	var nombre=$("#nombre").val();
	var correo=$("#correo").val();
	var clave=$("#clave").val();
	var tipo=$("#tipo:checked").val();
	
	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarUsuario",
			id:id,
			nombre:nombre,
			correo:correo,
			clave:clave,
			tipo:tipo
			

		}

	});

	funcionAjax.done(function(retorno){
		alert("FUNCIONAAAAA");
		//Listado();
		//desloguear();	
		$("#informe").html(retorno);
		alert(retorno);
		
	});

	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);
	});
}

function EditarUsuario(idParametro)
{   
	alert(idParametro);
	//alert("EDITAR");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUsuario",
			id:idParametro
		}
	});

	funcionAjax.done(function(retorno){
		//alert(retorno);
		var usuario=JSON.parse(retorno);
		$("#idUsuario").val(usuario.id);
		$("#nombre").val(usuario.nombre);
		$("#correo").val(usuario.correo);
		$("#clave").val(usuario.clave);
		if(usuario.tipo=="admin")
			$('input:radio[name="tipo"][value=admin]').prop('checked',true);
		else
			$('input:radio[name="tipo"][value=user]').prop('checked',true);

		
		
	});
	funcionAjax.fail(function(retorno){
	$("#informe").html(retorno.responseText);

	});
	MostrarRegistro();
}

function MiPerfil()
{

	alert("perfilll");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MiPerfil",
			
		}
	});

	funcionAjax.done(function(retorno){
		//alert(retorno);
		var usuario=JSON.parse(retorno);
		$("#idUsuario").val(usuario.id);
		$("#nombre").val(usuario.nombre);
		$("#correo").val(usuario.correo);
		$("#correo").attr("readonly",true);
		$("#clave").val(usuario.clave);
		$("#clave").attr("readonly",true);
		if(usuario.tipo=="admin")
			$('input:radio[name="tipo"][value=admin]').prop('checked',true);
		else
			$('input:radio[name="tipo"][value=user]').prop('checked',true);
		$("#tipo").attr("disabled",true);
		
		
	});
	funcionAjax.fail(function(retorno){
	$("#informe").html(retorno.responseText);

	});
	MostrarRegistro();
	

}

function BorrarUsuario(idParametro)
{
alert("BORRAAA");
var funcionAjax=$.ajax({
	url:"nexo.php",
	type:"post",
	data:{
		queHacer:"BorrarUsuario",
		id:idParametro
	}
});

funcionAjax.done(function(retorno){
	Listado();
	//alert(retorno);
	$("#informe").html("elementos eliminados: "+retorno);
});

funcionAjax.fail(function(retorno){
	$("#informe").html(retorno.responseText);
});
}
