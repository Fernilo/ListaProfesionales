<?php 
	include("includes/conexion.php");
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	$profesion=$_POST['profesion'];
	$sql="INSERTgdf INTO persona(nombre,apellido,correo,profesion) VALUES ('$nombre','$apellido','$email','$profesion')";
	echo $resp=mysqli_query($db,$sql);
 ?>