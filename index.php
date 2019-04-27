<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Profesionales</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="Alerts/css/alertify.css">
	<link rel="stylesheet" href="Alerts/css/themes/default.css">
	<link rel="stylesheet" href="includes/estilos.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<h2>Agregar Persona</h2>
				<form action="" method="post" id="formulario">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre">
						<div class="errores" id="error1">Falta Nombre</div>
					</div>
					<div class="form-group">
						<label for="apellido">Apellido</label>
						<input type="text" placeholder="Apellido" class="form-control" id="apellido" name="apellido">
						<div class="errores" id="error2">Falta Apellido</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" placeholder="Email" class="form-control" id="email" name="email">
						<div class="errores" id="error3">Falta Email Válido</div>
					</div>
					<div class="form-group">
						<label for="profesion">Profesión</label>
						<select class="form-control" id="profesion" name="profesion">
							<option value="" selected="true" disabled="" >Seleccione</option>
							<option value="abogado" >Abogado</option>
							<option value="nutricion" >Nutricionista</option>
							<option value="vete" >Veterinario</option>
							<option value="med" >Médico</option>
							<option value="ing1" >Ingeniero en Sistemas</option>
							<option value="ing2" >Ingeniero Electricista</option>
						</select>
						<div class="errores" id="error4">Falta Profesión</div>
					</div>
					<input type="button" value="Agregar" class="btn btn-primary  btn-lg btn-block" id="PersonaNueva">
					
				</form>
			</div>
			<div class="col-md-8">
				<h2>Personas agregadas</h2>
				<div id="tabla"></div>
				
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="Alerts/alertify.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
	<script>
		$(document).ready(function(){
			$('#tabla').load("includes/tabla.php");
		});
	</script>
	<script>
		$(document).ready(function(){
			var cadena=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
			$('#PersonaNueva').click(function(){
				var nombre=$('#nombre').val();
				var apellido =$('#apellido').val();
				var email=$('#email').val();
				var profesion =$('#profesion option:selected').val();
				if(nombre == "" || nombre.length == 0 || /^\s+$/.test(nombre)){
					$("#error1").fadeIn();
					return false;
				}
				else{
					$("#error1").fadeOut();
					if(apellido== "" || apellido.length == 0 || /^\s+$/.test(apellido)){
						$("#error2").fadeIn();
						return false;
					}
					else{
						$("#error2").fadeOut();
						if(email =="" || !cadena.test(email)){
							$("#error3").fadeIn();
							return false;
						}
						else{
							$("#error3").fadeOut();
							if( profesion ==""){
								$("#error4").fadeIn();
								return false
							}
						}
					}
				}
				$.ajax({
					type:"POST",
					url:"persona.php",
					data:$('#formulario').serialize(),
					success:function(data){
						if(data==1){
							$('#tabla').load('includes/tabla.php');
							alertify.success("Agregado con éxito");
						}
						else{
							alertify.error("Falló");
						}
					}
				});

			});
			
			
		});
	</script>

	<script>
		function preguntar(id){
			alertify.confirm('Eliminar','Seguro desea eliminar este registro?',function(){eliminar(id)},function(){
				alertify.error('Cancelado');
			});
		}
		function eliminar(id){
			cadena="id="+id;
			$.ajax({
				type:'post',
				url:'borrar.php',
				data:cadena,
				success:function(r){
					if(r==1){
						$('#tabla').load("includes/tabla.php");
						alertify.success("Eliminado Correctamente");
					}
					else{
						alertify.error('Hubo un error');
					}
				}
			});
		}
	</script>



</body>
</html>