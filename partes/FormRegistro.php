
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<div id="FormRegistro" class="container">
<form  class="form-ingreso" onsubmit="GuardarUsuario();return false">
	<h2 class="form-ingreso-heading">Registro</h2>
	<label for="nombre" class="sr-only">NOMBRE</label>
	<input type="text" id="nombre" class="form-control" placeholder="Ingrese Nombre"  title="Ingrese Nombre" required="" >
	<label for="correo" class="sr-only" hidden>CORREO</label>
    <input type="email" id="correo" class="form-control" placeholder="Correo" required="">
    <label for="clave" class="sr-only" hidden>CLAVE</label>
    <input type="password" id="clave" class="form-control" placeholder="Clave" required="" >
    <input type="radio" id="tipo" name="tipo" value="admin" required="">Admin<br>
	<input type="radio" id="tipo" name="tipo" value="user" required="">User
	
<input readonly   type="hidden"    id="idUsuario" class="form-control" >
<button  class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>REGISTRAR </button>

</div>
</form>
  
   