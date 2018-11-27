<?php 
	define('DB_PASS','');
	define('DB_USER','root');
	define('DB_NAME','profesionales');
	define('DB_HOST','localhost');

	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	if(!$db){
		echo "Error de conexion";
		echo "Error de conexion".mysqli_connect_error().PHP_EOL;
		echo "Errno de conexion".mysqli_connect_errno().PHP_EOL;
	}
	else{
		//echo "conexion OK";
	}




 ?>