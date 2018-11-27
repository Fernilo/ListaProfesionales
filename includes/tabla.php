<?php 
include("conexion.php");
?>
<table class="table table-hover table-bordered table-dark table-sm">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
			<th>Profesión</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql="SELECT * FROM persona WHERE 1=1";
		$r=mysqli_query($db,$sql);
		if($r){
			while($rs=mysqli_fetch_array($r)){

		?> 	
				<tr>
					<td><?php echo $rs['nombre']; ?></td>
					<td><?php echo $rs['apellido']; ?></td>
					<td><?php echo $rs['correo']; ?></td>
					<td><?php echo $rs['profesion']; ?></td>
					<td><button class="btn btn-warning" onclick="preguntar(<?php echo $rs['idPersona']; ?>)">Eliminar</button></td>
				</tr>	
		<?php
			}
		}

		?>

	</tbody>


</table>