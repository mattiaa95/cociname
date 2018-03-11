<?php
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'cociname');
$conn->query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM tipos";
  if (!$resultado = $conn->query($sql)) {
      exit;
  }
  $datos= array();
  while ($tipo = $resultado->fetch_assoc()) {
   $row = array(
      'id' => $tipo['id_tipo'],
      'nombre' => $tipo['tipo']
      );
  array_push($datos, $row);
  }
  $resultado->free();
  $conn->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
