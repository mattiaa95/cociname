<?php
if (isset($_POST["hacer"])) {
  if (!empty($_POST["hacer"])) {
      $hacer = $_POST["hacer"];
  }
}

header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'cociname');
$conn->query("SET NAMES 'utf8'");
if ($hacer == 1) {
if(isset($_POST["nombre"]) && isset($_POST["receta_descripcion"])&& isset($_POST["precio"])&& isset($_POST["id_user"])&& isset($_POST["porcion"])&& isset($_POST["hacer"]) ){

	if( !empty($_POST["nombre"])  && !empty($_POST["receta_descripcion"])&& !empty($_POST["precio"])&& !empty($_POST["id_user"])&& !empty($_POST["porcion"])&& !empty($_POST["hacer"])  ){

    $nombre = $_POST["nombre"];
    $receta_descripcion  = $_POST["receta_descripcion"];
    $precio = $_POST["precio"];
    $id_user = $_POST["id_user"];
    $porcion = $_POST["porcion"];
    $id_tipo = $_POST["id_tipo"];
		// To protect MySQL injection for Security purpose
		$nombre = stripslashes($nombre);
		$receta_descripcion = stripslashes($receta_descripcion);
		$precio = stripslashes($precio);
		$id_user = stripslashes($id_user);
		$porcion = stripslashes($porcion);
		$id_tipo = stripslashes($id_tipo);

    $nombre = mysql_real_escape_string($nombre);
    $receta_descripcion = mysql_real_escape_string($receta_descripcion);
    $precio = mysql_real_escape_string($precio);
    $id_user = mysql_real_escape_string($id_user);
    $porcion = mysql_real_escape_string($porcion);
    $id_tipo = mysql_real_escape_string($id_tipo);

$sql = "INSERT INTO recetas VALUES ( NULL,'$nombre', '$id_user', '$receta_descripcion', '$precio','$porcion' ,'$id_tipo' )";

			if ($conn->query($sql)) {
        $dato = array(
           'creado' => '1',
           'precio' => $precio,
           'id_user' => $id_user,
           'receta_descripcion' => $receta_descripcion,
           'nombre' => $nombre,
           'porcion' => $porcion,
           'id_tipo' => $id_tipo
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
			}


		$conn->close();
	}
}
}else {
  $sql = "SELECT * FROM recetas";
  if (!$resultado = $conn->query($sql)) {
      exit;
  }
  if ($resultado->num_rows === 0) {
      exit;
  }
  $datos= array();
  while ($receta = $resultado->fetch_assoc()) {
   $row = array(
      'id' => $receta['id_receta'],
      'precio' => $receta['precio'],
      'id_user' => $receta['id_user'],
      'receta_descripcion' => $receta['receta_descripcion'],
      'nombre' => $receta['nombre']
      );
  array_push($datos, $row);
  }
  $resultado->free();
  $conn->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}


?>
