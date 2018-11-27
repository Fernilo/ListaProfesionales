<?php 
	include("includes/conexion.php");
	$id=$_POST['id'];
	$sql="DELETE FROM persona WHERE IdPersona='$id' ";
	$r=mysqli_query($db,$sql);
	echo $r;


 ?>