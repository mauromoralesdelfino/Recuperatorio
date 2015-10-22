<?php
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");


$queHago=$_POST['queHacer'];
//echo"<script>alert('var_dump($queHago)')</script>";

switch ($queHago) {
	case 'MostrarRegistro':
		 //echo"<script>alert('login.php!!!!')</script>";
 			include("partes/FormRegistro.php");
		break;
	
	case 'MostrarIngreso':
			//echo"<script>alert('votar.php!!!!')</script>";
			include("partes/FormIngreso.php");
		break;

	case 'MostrarListado':
			include("partes/listado.php");
		break;
	
	case 'BorrarUsuario':
			$usuario= new usuario();
			$usuario->id=$_POST['id'];
			$cantidad=$usuario->BorrarUsuario();
			echo $cantidad;
		break;

	case 'GuardarUsuario':
	//echo"<script>alert('votar.php!!!!')</script>";
	//echo"<script>alert('var_dump($queHago)')</script>";
			session_start();
			$usuario= new usuario();
			$usuario->id=$_POST['id'];
			$usuario->nombre=$_POST['nombre'];
			$usuario->correo=$_POST['correo'];
            $usuario->clave=$_POST['clave'];
            $usuario->tipo=$_POST['tipo'];
			$cantidad = $usuario->GuardarUsuario();
			echo $cantidad;
			$cuki=$_POST['nombre'];
			/*setcookie("nombre",$cuki);
			$cuki2=$_POST['correo'];
			setcookie("correo",$cuki2);*/
		break;

	case 'TraerUsuario':
			$usuario = usuario::TraerUsuario($_POST['id']);
			echo json_encode($usuario);
		break;

	case 'MiPerfil':
	//echo"<script>alert('votar.php!!!!')</script>";
			session_start();
			//echo"<script>alert('".$_SESSION['clave']."')</script>";
			$usuario= usuario::validarusuario($_SESSION['registro'],$_SESSION['clave']);
			echo json_encode($usuario);
			break;
	

	default:


		# code...
		break;
}


?>