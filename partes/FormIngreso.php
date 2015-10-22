<?php 
session_start();
if(!isset($_SESSION['registro'])){  ?>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<div id="FormIngreso" class="container">
<form  class="form-ingreso" onsubmit="Login();return false">
	<h2 class="form-ingreso-heading">Ingreso</h2>
	<label for="correo" class="sr-only" hidden>CORREO</label>
    <input type="email" id="correo" class="form-control" placeholder="Correo" required="" value="<?php  if(isset($_COOKIE["correo"])){echo $_COOKIE["correo"];}?>"  >
    <label for="clave" class="sr-only" hidden>CLAVE</label>
    <input type="password" id="clave" class="form-control" placeholder="Clave" required="" value="<?php  if(isset($_COOKIE["clave"])){echo $_COOKIE["clave"];}?>" >
	

<button  class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>ENTRAR </button>

</div>
</form>
<?php
}else{  echo"<h3>usted '".$_SESSION['registro']."' esta logeado. </h3>";

   echo" <button onclick='desloguear()'' class='btn btn-lg btn-danger btn-block' type='button'><span class='glyphicon glyphicon-off'>&nbsp;</span>Deslogearme</button>
    <button onclick='MiPerfil()' class='btn btn-lg btn-info btn-block' type='button'><span class='glyphicon glyphicon-user'>&nbsp;</span>Mi Perfil</button>";
}
?>         
   