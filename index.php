<?php 

include("db.php");
?>

<?php 
// todo el head y principio del body, está en header.php ya que se reutilizará
include("includes/header.php");
?>

	<div class="container p-4">
		
		<div class="row">
			<div class="col-md-4">
					
					<!--acá digo si existe el valor mensaje dentro de la sesión(si se guardó correctamente)-->
				<?php if (isset($_SESSION['mensaje'])) { ?>
					  <div class="alert alert-<?= $_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
					  	<!--acá lo muestro-->
					  	<?= $_SESSION['mensaje']?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  </div>
				<!--Borrar los datos de sesión-->
				<?php session_unset();} ?>


				<div class="card card-body">
					<form action="guardar.php" method="POST">
						<div class="form-group">
							<input type="text" name="titulo" autocomplete="off" class="form-control" placeholder="Título" autofocus>
						</div>
						<div class="form-group">
							<textarea name="descripcion" autocomplete="off" rows="2" class="form-control" placeholder="Descripción"></textarea>
						</div>
						<input type="submit" name="enviar" value="Guardar Tarea" class="btn btn-success btn-block">
					</form>
				</div>

			</div>

			<div class="col-md-8">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Descripción</th>
							<th>Crear Tarea</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							//consulta a la bd
							$query= "SELECT * FROM tarea";
							$result = mysqli_query($conexion, $query);

							//rellenado a tabla con resultados.
							while ($fila = mysqli_fetch_array($result)) { ?>
								<tr>
									<td><?php echo $fila['titulo'] ?></td>
									<td><?php echo $fila['descripcion'] ?></td>
									<td><?php echo $fila['fecha'] ?></td>
									<td>
										<!--Se envia por get el id del seleccionado-->
										<a href="editar.php?id=<?php echo $fila['id'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
										<a href="borrar.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>

									</td>
								</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>



<?php 
// todo el final del body y scrips, está en footer.php ya que se reutilizará
include("includes/footer.php");
?>



