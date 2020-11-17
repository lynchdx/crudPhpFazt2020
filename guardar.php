<?php 

include('db.php');

if (isset($_POST['enviar'])) {
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

 $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";

 $result = mysqli_query($conexion, $query);

 if (!$result) {
  	die("No se ha podido crear registros");
  }else{
  	
  	//se guardará mensaje de "guardado con éxito" en una sesión.
  	$_SESSION['mensaje'] = 'Tarea Guardada';


  	//se guarda clase de bootstrap en variable de sesion
  	$_SESSION['tipo_mensaje']= 'success';

  	//redirecciona al index tras guardar
  	header("location: index.php");

  }



}


 ?>