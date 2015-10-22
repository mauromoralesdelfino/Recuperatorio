<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$arrayDeUsuario=usuario::TraerTodosLosUsuarios();

 ?>
<?php

session_start();
if(isset($_SESSION['registro'])){  ?>

<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<?php

if($_SESSION['tipo']=="admin"){ echo "<th>Borrar</th>";} ?><th>Id</th><th>Nombre</th><th>Correo</th><th>Clave</th><th>Tipo</th>
		</tr>
	</thead>
	<tbody>

		<?php 
//echo var_dump($arrayDeUsuario);
foreach ($arrayDeUsuario as $usuario) {
	echo "<tr>";
	if($_SESSION['tipo']=="admin")
	{	
		echo "<td><a onclick='EditarUsuario($usuario->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>";
		echo "<td><a onclick='BorrarUsuario($usuario->id)' class='btn btn-danger'><span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>";
	}
	echo "	<td>$usuario->id</td>
			<td>$usuario->nombre</td>
			<td>$usuario->correo</td>
			<td>$usuario->clave</td>
			<td>$usuario->tipo</td>
		</tr>";
}
		 ?>
	</tbody>
</table>


  <?php }else{ echo "<h3>Usted no esta logeado. </h3>"; }

  ?>