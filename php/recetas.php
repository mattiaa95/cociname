<?php
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'cociname');
$conn->query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM recetas";
  if (!$resultado = $conn->query($sql)) {
      exit;
  }

  $datos= array();
  while ($receta = $resultado->fetch_assoc()) {
   $row = array(
      'id' => $receta['id_receta'],
      'precio' => $receta['precio'],
      'id_user' => $receta['id_user'],
      'receta_descripcion' => $receta['receta_descripcion'],
      'nombre' => $receta['nombre'],
      'src' => $receta['img']
      );
  array_push($datos, $row);
  }
  $resultado->free();
  $conn->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
