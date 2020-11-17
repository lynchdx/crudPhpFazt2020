<?php 

include('db.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM tarea WHERE id = $id";
		$result = mysqli_query($conexion, $query);
		if (mysqli_num_rows($result) == 1) {
			$fila = mysqli_fetch_array($result);
			$titulo = $fila['titulo'];
			$descripcion = $fila['descripcion'];
		}
	}


	//si existe (presiona) el boton "actualizar" (funciona solo si se se cumple el acutalizar).
	if (isset($_POST['actualizar'])) {
		
		//entrego id para ser actualizado
		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE tarea set titulo = '$titulo', descripcion = '$descripcion' WHERE id=$id ";
		mysqli_query($conexion, $query);

		$_SESSION['mensaje'] = 'Tarea actualizada';
		$_SESSION['tipo_mensaje'] = 'warning'; //clase bootstrap
		header("Location: index.php");

	}




 ?>



 <?php include("includes/header.php") ?>

 <div class="container p-4">
 	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" value="<?php echo $titulo;?>" class="form-control" placeholder="Actualiza Titulo">
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $descripcion; ?></textarea>
					</div>
					<button class="btn btn-success" name="actualizar">
						Actualizar
					</button>
				</form>
			</div>
		</div> 		
 	</div>
 </div>


 <?php include("includes/footer.php") ?>