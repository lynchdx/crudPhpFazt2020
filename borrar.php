<?php 
include("db.php");

	//si existe el id enviado por get...se guarda en variable $id.
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM tarea WHERE id = $id";
		$result = mysqli_query($conexion, $query);
		if (!$result) {
			die("Consulta fallada");
		}

		$_SESSION['mensaje'] = 'Tarea borrada';
		$_SESSION['tipo_mensaje'] = "danger";
		header("Location: index.php");
	}


 ?>