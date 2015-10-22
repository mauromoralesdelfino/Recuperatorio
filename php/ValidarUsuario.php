<?php 

require_once("../clases/AccesoDatos.php");
require_once("../clases/usuario.php");

session_start();
$unUsuario = usuario::ValidarUsuario($_POST['correo'],$_POST['clave']);

//if ($_POST['usuario']=="octavio" && $_POST['clave']=="1234")
if($unUsuario)
{
	setcookie("correo",$unUsuario->correo,  time()+48600, "/");
	setcookie("clave",$unUsuario->clave,  time()+48600, "/");
	$_SESSION['registro']=$unUsuario->correo;
	$_SESSION['clave'] = $unUsuario->clave;
	$_SESSION['tipo'] = $unUsuario->tipo;
	//echo"<script>alert('$unUsuario->')</script>";
	//echo"<script>alert('var_dump('".$_SESSION['tipo']."')')</script>";
	echo "correcto";
	

}else
{
	echo "no esta en la base de datos";
}


?>