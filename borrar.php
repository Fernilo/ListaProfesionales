<?php 
	include("includes/conexion.php");
	$id=$_POST['id'];

	$sql="DELETE FROM personas WHERE id='$id' ";
	$r=mysqli_query($db,$sql);
	echo $r;


 ?>